<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;

    public function mount()
    {
        // Fetch products from the database
        $this->products = Product::all(); // or add filtering as needed
    }

    public function render()
    {
        return view('livewire.products');
    }
}
