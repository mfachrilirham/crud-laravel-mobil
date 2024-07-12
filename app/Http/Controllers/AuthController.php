<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['email' => 'Invalid login credentials']);
        }

        // if (Auth::user()->role == 'admin') {
        //     return redirect()->route('admin.dashboard')->with('success', 'Login successful');
        // } else {
        //     return redirect()->route('user.dashboard')->with('success', 'Login successful');
        // }
        return redirect()->route('user.dashboard')->with('success', 'Login successful');
    }

    // public function adminLogin(Request $request)
    // {
        // $credentials = $request->only('username', 'password');

        // if ($credentials['username'] === 'admin' && $credentials['password'] === '1234') {
        //     Auth::loginUsingId(1); // Assuming admin has ID 1
        //     return redirect()->route('admin.dashboard');
        // }

        // return redirect()->route('admin.login')->withErrors(['username' => 'Invalid credentials.']);

        // $credentials = $request->only('username', 'password');

        // if (Auth::guard('admin')->attempt($credentials)) {
        //     return redirect()->route('admin.dashboard');
        // }

        // return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials']);

        // $admin = new Admin();
        // $admin->username = 'admin';
        // $admin->password = Hash::make('1234');
        // $admin->save();

        // $request->validate([
        //     'username' => 'required|string',
        //     'password' => 'required|string',
        // ]);

    //     $credentials = $request->only('username', 'password');

    //     $admin = Admin::where('username', $credentials['username'])->first();

    //     if ($admin && Hash::check($credentials['password'], $admin->password)) {
    //         Auth::guard('admin')->login($admin);
    //         return redirect()->route('admin.dashboard')->with('success', 'Login successful');
    //     }

    //     return redirect()->route('admin.login')->withErrors(['username' => 'Invalid credentials']);
    
    // }

    public function showAdminDashboard(Request $request) {
        return view('auth.dashboard');
    }

    public function showUserDashboard(Request $request) {
        return view('auth.user');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful');
    }

    // public function adminLogout(Request $request)
    // {
    //     Auth::logout();
    //     return redirect()->route('admin.login')->with('success', 'Logout successful');
    // }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'User not found']);
        }

        $otp = $this->generateOTP($user->email);

        // You can send OTP via email or other means if needed
        // Mail::to($user->email)->send(new OTPMail($otp));

        return redirect()->route('otp.verify')->with('email', $user->email)->with('success', 'OTP has been sent. Expire in 5 minutes.');
    }

    // public function generateOTP($email)
    // {
    //     $otp = rand(100000, 999999); // Generate 6-digit OTP

    //     DB::table('otps')->insert([
    //         'otp' => $otp,
    //         'expires_at' => now()->addMinutes(5),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     Log::info('OTP for ' . $email . ' is ' . $otp); // Save OTP to log
    //     return $otp;
    // }

    // public function verifyOTP(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'otp' => 'required|integer',
    //     ]);

    //     $email = $request->email;
    //     $otp = $request->otp;

    //     DB::table('otps')->where('expires_at', '<', now())->delete();

    //     $otpRecord = DB::table('otps')
    //         ->where('otp', $otp)
    //         ->where('expires_at', '>', now())
    //         ->first();

    //     if (!$otpRecord) {
    //         return redirect()->back()->withInput()->withErrors(['otp' => 'Invalid or expired OTP']);
    //     }

    //     DB::table('otps')->where('id', $otpRecord->id)->delete();

    //     return redirect()->route('password.reset.form')->with('email', $email)->with('success', 'OTP verified. Please reset your password.');
    // }


    // public function showResetPasswordForm(Request $request)
    // {
    //     return view('auth.reset-password')->with('email', session('email'));
    // }

    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         return redirect()->back()->withErrors(['email' => 'User not found']);
    //     }

    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return redirect()->route('login')->with('success', 'Password reset successfully. Please login.');
    // }

    // public function destroyUser($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect('dashboard')->with(['success' => 'User deleted successfully!']);
    // }
}
