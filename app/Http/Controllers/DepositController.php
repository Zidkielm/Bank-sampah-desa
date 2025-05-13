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
    public function index()
    {
        $deposits = Deposit::with(['user', 'wasteType', 'receiver'])
                      ->orderBy('deposit_date', 'desc')
                      ->paginate(10);

        $nasabahUsers = User::where('role', 'nasabah')
                         ->where('status', 'active')
                         ->orderBy('name')
                         ->get();

        $wasteTypes = WasteType::where('status', 'active')
                       ->orderBy('name')
                       ->get();

        return view('pages.admin.setoran', compact('deposits', 'nasabahUsers', 'wasteTypes'));
    }

    public function petugasIndex()
    {
        $deposits = Deposit::with(['user', 'wasteType', 'receiver'])
                      ->orderBy('deposit_date', 'desc')
                      ->paginate(10);

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

        return view('pages.admin.reports.setoran-report', compact(
            'deposits', 'startDate', 'endDate', 'totalWeight', 'totalAmount'
        ));
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

        return view('pages.petugas.reports.setoran-report', compact(
            'deposits', 'startDate', 'endDate', 'totalWeight', 'totalAmount'
        ));
    }
}
