<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    // Step 1: Show forget password form
    public function forgetPassword()
    {
        return view('auth.forgot-password'); // এখানে phone input থাকবে
    }

    // Step 2: Handle forget password form submit (send OTP via SMS)
    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
        ]);

        // Generate 6 digit OTP
        $otp = rand(100000, 999999);

        // Store OTP in session
        session([
            'password_reset_phone' => $request->phone,
            'password_reset_otp'   => $otp,
            'password_reset_expire'=> now()->addMinutes(5) 
        ]);

        // Send OTP via SMS
        sendSms($request->phone, "Your password reset OTP is: $otp");

        return redirect()->route('verify.otp.form')->with('success', 'OTP sent to your mobile.');
    }

    // Step 3: Show OTP verification form
    public function verifyOtp()
    {
        return view('auth.otp.otp_verification');
    }

    // Step 4: Show reset password form


    // Step 5: Handle reset password form submit
   public function resetPasswordPost(Request $request)
{
    $request->validate([
        'otp' => 'required',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Check OTP from session
    if (
        !session()->has('password_reset_otp') ||
        $request->otp != session('password_reset_otp') ||
        (session('password_reset_expire') && now()->gt(session('password_reset_expire')))
    ) {
        return back()->with('error', 'Invalid OTP.');
    }

    // Update user password
    $user = User::where('phone', session('password_reset_phone'))->first();
    $role=$user->role;
    $user->password = Hash::make($request->password);
    $user->save();

    // Clear session
    session()->forget(['password_reset_phone', 'password_reset_otp', 'password_reset_expire']);

    // Redirect logic based on role
    if ($role==3) {
        // Normal user
        return redirect()->route('login')->with('success', 'Password reset successful!');
    }

    if ($role == 2) {
        // Vendor user
        return redirect()->route('vendor.login_form')->with('success', 'Password reset successful!');
    }

    // Default fallback
    return redirect()->route('login')->with('success', 'Password reset successful!');
}


// affiliate password reset
public function AffiliateforgetPassword()
    {
        return view('FrontEnd.affiliate.auth.forgot-password');
    }

    public function AffiliateforgetPasswordPost(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:affiliates,phone',
        ]);

        $otp = rand(100000, 999999);

        session([
            'affiliate_password_reset_phone' => $request->phone,
            'affiliate_password_reset_otp'   => $otp,
            'affiliate_password_reset_expire'=> now()->addMinutes(5)
        ]);

        sendSms($request->phone, "Your affiliate password reset OTP is: $otp");

        return redirect()->route('affiliate.verify.otp.form')->with('success', 'OTP sent to your mobile.');
    }

    public function AffiliateverifyOtp()
    {
        return view('FrontEnd.affiliate.auth.otp_verification');
    }

    public function AffiliateresetPasswordPost(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (
            !session()->has('affiliate_password_reset_otp') ||
            $request->otp != session('affiliate_password_reset_otp') ||
            (session('affiliate_password_reset_expire') && now()->gt(session('affiliate_password_reset_expire')))
        ) {
            return back()->with('error', 'Invalid OTP.');
        }

        $affiliate = Affiliate::where('phone', session('affiliate_password_reset_phone'))->first();

        if (!$affiliate) {
            return back()->with('error', 'Affiliate not found.');
        }

        $affiliate->password = Hash::make($request->password);
        $affiliate->save();

        session()->forget(['affiliate_password_reset_phone', 'affiliate_password_reset_otp', 'affiliate_password_reset_expire']);

        return redirect()->route('login.affiliate')->with('success', 'Password reset successful!');
    }
}


