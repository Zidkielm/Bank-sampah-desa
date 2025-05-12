<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if ($request->wantsJson()) {
            return new JsonResponse('', 204);
        }

        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboard');
            case 'petugas':
                return redirect()->route('petugas.dashboard');
            case 'nasabah':
                return redirect()->route('nasabah.dashboard');
            default:
                return redirect()->intended(config('fortify.home'));
        }
    }
}
