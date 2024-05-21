<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $user = $this->createUser($request->all());

        // event(new Registered($user));

        Auth::login($user);

        try {
            $user->sendEmailVerificationNotification();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            // If SMTP fails, delete the user and throw an error
            $user->delete();
            throw ValidationException::withMessages([
                'email' => 'There was an error sending the verification email. Please try again later.',
            ]);
        }

        return redirect()->intended(config('fortify.home'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);
    }

    protected function createUser(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'country_code' => $data['country_code'],
            'mobile_no' => $data['mobile_no'],
            'password' => Hash::make($data['password']),
        ]);

        $token_api = $user->createToken(config("app.name"))->plainTextToken;

        $user->update(['api_key' => $token_api]);

        return $user;
    }
}
