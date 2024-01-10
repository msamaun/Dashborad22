<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function register(Request $request): JsonResponse
    {
        try{
            $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ]);

            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ]);
            return response()->json(['status' => 'success', 'message' => 'User created successfully']);

        }catch (Exception $e){
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    function login(Request $request):JsonResponse
    {
        try {
            $request->validate([
               'email' => 'required|string|email|max:255',
               'password' => 'required|string',
            ]);
            $user = user::where('email',$request->input('email'))->first();
            if(!$user || !Hash::check($request->input('password'), $user->password)){
                return response()->json(['status' => 'failed', 'message' => 'Invalid credentials']);
            }
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'User logged in successfully', 'token' => $token]);
        }

        catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    function profile(Request $request):Authenticatable
    {
        return Auth::user();
    }

    function update(Request $request):JsonResponse{
        try {
           $request->validate([
               'firstName' => 'required|string|max:255',
               'lastName' => 'required|string|max:255',
               'phone' => 'required|string|max:255',
               'address' => 'required|string|max:255',
           ]);
           User::where('id',Auth::user()->id)->update([
               'firstName' => $request->input('firstName'),
               'lastName' => $request->input('lastName'),
               'phone' => $request->input('phone'),
               'address' => $request->input('address'),
           ]);
           return response()->json(['status' => 'success', 'message' => 'User updated successfully']);
        }

        catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    function sendOtp(Request $request):JsonResponse
    {
        try {
            $request->validate([
               'email' => 'required|string|email|max:255',
            ]);
            $email = $request->input('email');
            $otp = rand(100000, 999999);
            $count = User::where('email', $email)->count();

            if($count > 0)
            {
                Mail::to($email)->send(new OTPMail($otp));
                User::where('email', $email)->update(['otp' => $otp]);
                return response()->json(['status' => 'success', 'message' => 'OTP sent successfully']);
            }
            else
            {
                return response()->json(['status' => 'failed', 'message' => 'User not found']);
            }
        }

        catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    function verifyOtp(Request $request): JsonResponse{
        try {
           $request->validate([
               'email' => 'required|string|email|max:255',
               'otp' => 'required|string|max:255',
           ]);
           $email = $request->input('email');
           $otp = $request->input('otp');

           $user = User::where('email', $email)->where('otp', $otp)->first();

           if(!$user){
               return response()->json(['status' => 'failed', 'message' => 'Invalid OTP']);
           }
           else{
               User::where('email', $email)->update(['otp' => 0]);
               $token = $user->createToken('authToken')->plainTextToken;
               return response()->json(['status' => 'success', 'message' => 'OTP verified successfully', 'token' => $token]);
           }
        }

        catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    function resetPassword(Request $request)
    {
        try {
            $request->validate([
               'password' => 'required|string',
            ]);
            $id = Auth::user()->id;
            $password = $request->input('password');
            User::where('id',Auth::user()->$id)->update(['password' => Hash::make($password)]);
            return response()->json(['status' => 'success', 'message' => 'Password reset successfully']);
        }

        catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['status' => 'success', 'message' => 'User logged out successfully']);
    }
}
