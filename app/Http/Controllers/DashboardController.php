<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class DashboardController extends Controller
{
    /**
     * Show the user's dashboard with order history.
     */
    public function index()
    {
        // Get the email of the logged-in user
        $userEmail = Auth::user()->email;

        // Fetch orders for the logged-in user
        $orders = Order::where('customer_email', $userEmail)->get();

        // Pass orders to the dashboard view
        return view('dashboard', compact('orders'));
    }
}
