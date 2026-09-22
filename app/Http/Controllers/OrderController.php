<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;


class OrderController extends Controller
{
    public function showCheckout()
    {
        $cart = Session::get('cart', []); // Get the cart from the session
        return view('checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        // Validate customer details
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|min:10|max:15',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:Cash on Delivery,Card on Delivery',
        ]);

        // Get cart items from the session
        $cart = Session::get('cart', []);

        // Calculate the total price
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        
        // Save the order to the database
        $order = \App\Models\Order::create([
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_contact' => $request->contact_number,
            'customer_address' => $request->address,
            'payment_method' => $request->payment_method,
            'total_price' => $totalPrice, // Save the calculated total price
            'products_ordered' => json_encode($cart), // Store the entire cart as a JSON in the 'products_ordered' column
            
        ]);


        // Clear the cart
        Session::forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }

    public function showDashboard()
    {
        // Fetch all orders
        $orders = Order::all(); // Or use pagination: Order::paginate(10);

        return view('admin.dashboard', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Processing,Completed',
        ]);

        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->withErrors(['message' => 'Order not found.']);
        }

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function index()
    {
        // Get all orders
        $orders = Order::all();

        // Calculate total sales
        $totalSales = $orders->sum('total_price');

         // Calculate total orders
        $totalOrders = $orders->count();

        // Calculate total processing orders
        $totalProcessingOrders = $orders->where('status', 'Processing')->count();

        // Calculate total completed orders
        $totalCompletedOrders = $orders->where('status', 'Completed')->count();

        // Pass orders, totalSales, and totalOrders to the view
        return view('admin.dashboard', compact('orders', 'totalSales', 'totalOrders', 'totalProcessingOrders', 'totalCompletedOrders'));
    
    }

    
}