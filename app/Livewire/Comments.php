<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;

class Comments extends Component
{
    public $product;
    public $commentText;
    public $rating;


    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addComment()
    {
        $this->validate([
            'commentText' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Review::create([
            'product_id' => $this->product->id,
            'user_id' => auth()->id(),
            'comment' => $this->commentText,
            'rating' => $this->rating
        ]);

        $this->commentText = '';
        $this->rating = 0;
    }

  public function render()
{
    return view('livewire.comments', [
        'comments' => $this->product->reviews()->latest()->get(),
    ]);
}
public function setRating($value)
{
    $this->rating = $value;
}

}
