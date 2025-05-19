<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\WasteType;
use App\Models\Transaction;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function index(Request $request)
    {
        $query = Deposit::with(['user', 'wasteType', 'receiver']);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        $deposits = $query->orderBy('deposit_date', 'desc')
            ->paginate(10)
            ->withQueryString();

        $nasabahUsers = User::where('role', 'nasabah')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        $wasteTypes = WasteType::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('pages.admin.setoran', compact('deposits', 'nasabahUsers', 'wasteTypes'));
    }

    public function petugasIndex(Request $request)
    {
        $query = Deposit::with(['user', 'wasteType', 'receiver']);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        $deposits = $query->orderBy('deposit_date', 'desc')
            ->paginate(10)
            ->withQueryString();

        $nasabahUsers = User::where('role', 'nasabah')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        $wasteTypes = WasteType::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('pages.petugas.setoran', compact('deposits', 'nasabahUsers', 'wasteTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'deposit_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.waste_type_id' => 'required|exists:waste_types,id',
            'items.*.weight_kg' => 'required|numeric|min:0.01',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $user = User::findOrFail($request->user_id);
            $totalAmount = 0;

            foreach ($request->items as $item) {
                $wasteType = WasteType::findOrFail($item['waste_type_id']);
                $weight = $item['weight_kg'];
                $pricePerKg = $wasteType->price_per_kg;
                $itemTotal = $weight * $pricePerKg;

                $deposit = Deposit::create([
                    'user_id' => $request->user_id,
                    'waste_type_id' => $item['waste_type_id'],
                    'receiver_id' => Auth::id(),
                    'deposit_date' => $request->deposit_date,
                    'weight_kg' => $weight,
                    'price_per_kg' => $pricePerKg,
                    'total_amount' => $itemTotal,
                    'notes' => $request->notes,
                ]);

                $totalAmount += $itemTotal;
            }

            $balance = Balance::firstOrCreate(
                ['user_id' => $request->user_id],
                ['amount' => 0]
            );

            $oldBalance = $balance->amount;
            $newBalance = $oldBalance + $totalAmount;
            $balance->amount = $newBalance;
            $balance->save();

            Transaction::create([
                'user_id' => $request->user_id,
                'transactionable_id' => $deposit->id,
                'transactionable_type' => Deposit::class,
                'amount' => $totalAmount,
                'type' => 'credit',
                'balance_after' => $newBalance,
                'description' => 'Setoran sampah pada ' . date('d-m-Y', strtotime($request->deposit_date)),
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Setoran berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan setoran: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $deposit = Deposit::with(['user', 'wasteType', 'receiver', 'transaction'])
            ->findOrFail($id);

        if (request()->ajax()) {
            return response()->json($deposit);
        }

        return view('pages.admin.detail-setoran.detail-modal', compact('deposit'));
    }

    public function getWasteTypePrice($id)
    {
        $wasteType = WasteType::findOrFail($id);
        return response()->json(['price_per_kg' => $wasteType->price_per_kg]);
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $deposits = Deposit::with(['user', 'wasteType', 'receiver'])
            ->whereBetween('deposit_date', [$startDate, $endDate])
            ->orderBy('deposit_date')
            ->get();

        $totalWeight = $deposits->sum('weight_kg');
        $totalAmount = $deposits->sum('total_amount');

        $filename = 'laporan_setoran_' . date('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function () use ($deposits, $totalWeight, $totalAmount) {
            $file = fopen('php://output', 'w');

            fputs($file, "\xEF\xBB\xBF");

            fputcsv($file, [
                'No.',
                'Tanggal',
                'Nasabah',
                'Jenis Sampah',
                'Berat (KG)',
                'Harga/KG',
                'Total'
            ]);

            $counter = 1;
            foreach ($deposits as $deposit) {
                fputcsv($file, [
                    $counter++,
                    $deposit->deposit_date->format('d-m-Y'),
                    $deposit->user->name,
                    $deposit->wasteType->name,
                    number_format($deposit->weight_kg, 2),
                    number_format($deposit->price_per_kg, 0, ',', '.'),
                    number_format($deposit->total_amount, 0, ',', '.')
                ]);
            }

            fputcsv($file, ['']);
            fputcsv($file, ['Total Berat', '', '', '', number_format($totalWeight, 2) . ' KG']);
            fputcsv($file, ['Total Nilai', '', '', '', number_format($totalAmount, 0, ',', '.')]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function petugasGenerateReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $deposits = Deposit::with(['user', 'wasteType', 'receiver'])
            ->whereBetween('deposit_date', [$startDate, $endDate])
            ->orderBy('deposit_date')
            ->get();

        $totalWeight = $deposits->sum('weight_kg');
        $totalAmount = $deposits->sum('total_amount');

        // Generate CSV export
        $filename = 'laporan_setoran_' . date('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function () use ($deposits, $totalWeight, $totalAmount) {
            $file = fopen('php://output', 'w');

            // Add UTF-8 BOM to fix Excel encoding issues
            fputs($file, "\xEF\xBB\xBF");

            // CSV Header
            fputcsv($file, [
                'No.',
                'Tanggal',
                'Nasabah',
                'Jenis Sampah',
                'Berat (KG)',
                'Harga/KG',
                'Total'
            ]);

            // CSV Content
            $counter = 1;
            foreach ($deposits as $deposit) {
                fputcsv($file, [
                    $counter++,
                    $deposit->deposit_date->format('d-m-Y'),
                    $deposit->user->name,
                    $deposit->wasteType->name,
                    number_format($deposit->weight_kg, 2),
                    number_format($deposit->price_per_kg, 0, ',', '.'),
                    number_format($deposit->total_amount, 0, ',', '.')
                ]);
            }

            // Add total row
            fputcsv($file, ['']);
            fputcsv($file, [
                '',
                '',
                '',
                'TOTAL BERAT',
                number_format($totalWeight, 2, ',', '.') . ' KG',
                '',
                ''
            ]);
            fputcsv($file, [
                '',
                '',
                '',
                'TOTAL NILAI',
                number_format($totalAmount, 0, ',', '.'),
                '',
                ''
            ]);
            fputcsv($file, ['']); // pemisah visual di akhir

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
} 