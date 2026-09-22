<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class AddProduct extends Component
{
    use WithFileUploads;

    public $products; // Hold all products
    public $name, $price, $stock, $image, $productId = null; // For adding/updating
    public $editProductId = null; // ID of the product being edited

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|max:1024',
    ];

    
    public function mount()
    {
        $this->products = Product::all(); // Load products on mount
    }

    public function addProduct()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        if ($this->productId) {
            // Update existing product
            $product = Product::find($this->productId);
            $product->name = $this->name;
            $product->price = $this->price;
            $product->stock = $this->stock;
            if ($imagePath) {
                $product->image_path = $imagePath;
            }
            $product->save();

            session()->flash('message', 'Product updated successfully!');
        } else {
            // Create new product
            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'stock' => $this->stock,
                'image_path' => $imagePath,
            ]);

            session()->flash('message', 'Product added successfully!');
        }

        $this->resetInputs();
        $this->refreshProducts();
    }


    public $showEditModal = false;



    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        // Populate the properties with product details
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->stock = $product->stock;

        // Show the modal
        $this->showEditModal = true;
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($this->productId);

        $product->update([
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
        ]);

        session()->flash('message', 'Product updated successfully!');

        // Hide the modal and refresh the product list
        $this->showEditModal = false;
        $this->products = Product::all();
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.add-product');
    }

    
    public function resetInputs()
    {
        $this->name = null;
        $this->price = null;
        $this->stock = null;
        $this->image = null;
        $this->productId = null;
        $this->editProductId = null;
    }

    public function refreshProducts()
    {
        $this->products = Product::all();
    }


    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('products', compact('products')); // Pass products to the view
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
    
        if ($product) {
            // Product exists, proceed with deletion
            $product->delete();
            // Optionally, you can show a success message or refresh the list
            session()->flash('message', 'Product deleted successfully.');
        } else {
            // Product doesn't exist, handle the error
            session()->flash('error', 'Product not found.');
        }
    }
    
    public function showProducts()
    {
        // Fetch all products from the database
        $products = Product::all(); // or use your custom query

        // Pass products to the view
        return view('products', compact('products'));
    }
    
}

