<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Requests\VerifyEmailRequest;
use Laravel\Fortify\Contracts\VerifyEmailResponse;
use Illuminate\Auth\Events\Verified;
use Auth, Session;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    function __invoke(VerifyEmailRequest $request) {
     
        // dd($request->user()->markEmailAsVerified());
        if ($request->user()->hasVerifiedEmail()) {
            return app(VerifyEmailResponse::class);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return app(VerifyEmailResponse::class);

        return redirect()->route('dashboard');
    }

    public function notice() {

        if(!Auth::user()->hasVerifiedEmail()) {   
            return view('auth.verify');
        }

        return redirect()->route('dashboard');
    }
    
    public function verify(VerifyEmailRequest $request) {
        $request->user()->markEmailAsVerified();
        
        Auth::logout();
     
        Session::flash('success', 'Your account has been verified. Please continue to sign in.');
        return redirect()->route('login');
    }
    
    public function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }
}
