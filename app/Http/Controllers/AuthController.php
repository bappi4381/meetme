<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if credentials are valid
        if (Auth::attempt($credentials)) {
            // If valid, store user data in session and send OTP
            Session::put('user_id', Auth::id());
            $this->sendOtp();

            // Logout to prevent access until OTP verification
            Auth::logout();

            return redirect()->route('verify.otp')->with('message', 'OTP has been sent to your registered phone/email.');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    // Send OTP to user (Email)
    public function sendOtp()
    {
        $user = User::find(Session::get('user_id'));
        $otp = rand(100000, 999999); // Generate a random OTP

        // Save the OTP to the user's session for verification later
        Session::put('otp', $otp);

        \Mail::raw("Your OTP code is $otp", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Your OTP Code');
        });

        return back()->with('message', 'OTP sent successfully.');
    }

    // Show OTP verification form
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        // Check if the entered OTP matches the one in session
        if ($request->otp == Session::get('otp')) {
            // Clear OTP from session
            Session::forget('otp');

            // Log the user in using the stored user ID
            Auth::loginUsingId(Session::get('user_id'));

            // Clear user ID from session
            Session::forget('user_id');

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['otp' => 'The OTP is incorrect.']);
    }

    // Show protected dashboard
    public function dashboard()
    {
        return view('admin.main.index');
    }
    public function logout(Request $request)
    {
        // Log the user out of the application
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect the user to the login page
        return redirect('/admin/login')->with('message', 'You have been logged out.');
    }
}

