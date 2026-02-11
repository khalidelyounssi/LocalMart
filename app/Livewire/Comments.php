<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Comment;

class Comments extends Component
{
   public $Product;     
    public $commentText; 

   
    public function mount(Product $product)
    {
        $this->Product = $product;
    }

    public function addComment()
    {
        $this->validate([
            'commentText' => 'required|string|max:500',
        ]);

        Comment::create([
            'Product_id' => $this->Product->id,
            'user_id' => auth()->id(),
            'body' => $this->commentText,
        ]);

        $this->commentText = '';
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->Product->comments()->latest()->get(),
        ]);
    }
}
