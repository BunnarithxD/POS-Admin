<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::post('/pin-login', function (Request $request) {
    $request->validate([
        'pinLogin' => 'required|digits:4',
    ]);

    $user = User::where('pinLogin', $request->pinLogin)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid PIN',
        ], 401);
    }

    // Optional: create token for future requests
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'success' => true,
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ],
        'token' => $token,
    ]);
});
