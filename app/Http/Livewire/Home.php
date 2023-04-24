<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{

    public $products, $catgory,  $search = [];

    protected $queryString = ['search'];


    public function render()
    {
        $products = Product::where('category_id',$this->$cate->id)
            ->when($this->search, function ($q) {
                $q->whereIn('category_id', $this->search);
            })
            ->where('status', '0')
            ->get();



        return view('livewire.product', [
            'products' => $products
        ]);
    }
}
