<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;
use App\Models\Report;

class Comments extends Component
{
    public $product;
    public $commentText;
    public $rating = 0;


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

    public function reportComment($reviewId)
    {
       if (!auth()->id()) { 
    return redirect()->route('login');
}

        $review = Review::findOrFail($reviewId);

       
        $review->reports()->create([
            'user_id' => auth()->id(),
            'reason' => 'User reported this comment', 
            'status' => 'pending',
        ]);

       
        session()->flash('message', 'Thank you. The comment has been reported.');
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
