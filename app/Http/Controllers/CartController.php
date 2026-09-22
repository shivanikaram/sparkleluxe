<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }
    
    public function add(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Get the current cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cart[$product->id])) {
            // Update quantity if product is already in cart
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            // Add new product to the cart
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => $product->image_path,
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // public function view()
    // {
    //     return view('cart');
    // }

    // Method to update the cart quantity (increase or decrease)
    public function update(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'action' => 'required|in:increase,decrease',
            'quantity' => 'nullable|integer|min:1', // for custom quantity update
        ]);

        $product_id = $request->product_id;
        $action = $request->action;

        // Retrieve the cart from session
        $cart = session()->get('cart', []);

        // Check if the product exists in the cart
        if (isset($cart[$product_id])) {
            // Update the quantity based on the action
            if ($action == 'increase') {
                $cart[$product_id]['quantity']++;
            } elseif ($action == 'decrease' && $cart[$product_id]['quantity'] > 1) {
                $cart[$product_id]['quantity']--;
            } elseif ($request->has('quantity')) {
                // Use custom quantity if specified
                $cart[$product_id]['quantity'] = $request->quantity;
            }

            // Update the cart in session
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated!');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    // Method to remove a product from the cart
    public function remove(Request $request)
    {
        // Validate the product_id
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product_id = $request->product_id;

        // Retrieve the cart from session
        $cart = session()->get('cart', []);

        // Remove the product from the cart
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product removed from cart!');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    public function view()
    {
        // Retrieve the cart from session
        $cart = session()->get('cart', []);
        
        // Calculate total price
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Pass the cart and totalPrice to the view
        return view('cart', compact('cart', 'totalPrice'));
    }




}
