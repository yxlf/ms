<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getToken(Request $request)
    {
        try {
            $this->validate($request, [
                "username" => ["required", "between:5,16", "string"],
                "password" => ["required", "between:6,16", "string"],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => "field error", 'data' => $e->errors()]);
        }
        $token = auth()->attempt($request->only(["username", "password"]));
        if (!$token) {
            return response()->json(["error" => "Unauthorized"], 401);
        } else {
            return response()->json(["status" => "ok"], 201, ["Authorization" => "Bearer {$token}"]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(["message" => "Successful logout"]);
    }

    public function freshToken()
    {
        $newToken = auth()->refresh();
        return response()->json(["status" => "success"], 201, [
            "Authorization" => "bearer {$newToken}",
        ]);
    }

    public function passwordReset(Request $request)
    {
        try {
            $request->validate([
                'password' => ['required', 'between:5,16', 'string']
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => "field error", 'data' => $e->errors()]);
        }
        $user = \auth()->user();
        /** @var \App\Models\Admin|\Illuminate\Contracts\Auth\Authenticatable|null $user */
        $user->password = Hash::make($request->input('password'));
        $user->save();
        \auth()->logout();
        return response()->json(['status' => 'success', 'message' => "password reset successful"]);
    }
}
