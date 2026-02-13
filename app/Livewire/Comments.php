<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use App\Models\Review;
use App\Models\Report;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $product;
    public $commentText;
    public $rating = 0;
    public $canComment = false;


    public function mount(Product $product)
    {
        $this->canComment = Order::where('user_id', auth()->id())
                ->whereHas('items', function ($query) {
                    $query->where('product_id', $this->product->id);
                })
              
                ->exists();
    }

    public function addComment()
    {

    if (!$this->canComment) {
            session()->flash('error', 'You must purchase this product to leave a review.');
            return;
        }
        
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
        $comments = $this->product->reviews()->latest()->get();


        $canComment = false;
        
        if (Auth::id()) { 
            $canComment = OrderItem::whereHas('order', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->where('product_id', $this->product->id)
            ->exists();
        }

        return view('livewire.comments', [
            'comments' => $comments,
            'canComment' => $canComment
        ]);
    }
public function setRating($value)
{
    $this->rating = $value;
}

}
