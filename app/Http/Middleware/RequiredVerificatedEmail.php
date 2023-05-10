<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequiredVerificatedEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find($request->session()->get('id_user'));

        if (empty($user)) return redirect()->to(route('GET.logout'));
        if (empty($user->email_verified_at)) return redirect()->to(route('GET.required-verificated-email'));
        return $next($request);
    }
}
