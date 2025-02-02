<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::post('login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        return $user->createToken('YourAppName')->plainTextToken;
    }

    return response()->json(['message' => 'Unauthorized'], 401);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/orders', [OrderController::class, 'index']);  // Get all orders
    Route::post('/orders', [OrderController::class, 'placeOrder']); // Place an order
    Route::put('/orders/{id}', [OrderController::class, 'updateStatus']); // Update order status
});
