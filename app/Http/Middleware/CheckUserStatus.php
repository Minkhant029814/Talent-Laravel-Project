<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
        protected $logger;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger= $logger;
    }

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){

            $user = Auth::user();
           $this->logger->info('User staus check',['id'=>$user->id,'status'=>$user->stauts]);
            if($user->status !== 'active'){
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is blocked by the admin.');
            }
        }
        return $next($request);
    }
}
