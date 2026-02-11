<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Review;

new class extends Component
{
    use WithPagination;


    public $search = '';
    public $ratingFilter = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->update(['is_active' => '0']);
        }
    }

    public function with()
    {
        return [
            'reviews' => Review::query()
                ->with('user')
                ->latest()
                
                ->when($this->search, function ($q) {
                    $q->where('comment', 'like', '%' . $this->search . '%')
                      ->orWhereHas('user', function ($u) {
                          $u->where('name', 'like', '%' . $this->search . '%');
                      });
                })

                ->when($this->ratingFilter, function ($q) {
                    $q->where('rating', $this->ratingFilter);
                })

                ->paginate(5)
        ];
    }
};
?>

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

    {{-- Header: Search & Filters --}}
    <div class="p-4 border-b border-gray-100 bg-gray-50 flex flex-col md:flex-row gap-4 justify-between items-center">
        
        {{-- Search Input --}}
        <div class="relative w-full md:w-96">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input wire:model.live.debounce.300ms="search" 
                   type="text" 
                   placeholder="Search comments content or user..."
                   class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
        </div>

        {{-- Filters --}}
        <div class="flex gap-3 w-full md:w-auto">
            {{-- Rating Filter --}}
            <select wire:model.live="ratingFilter" class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none cursor-pointer">
                <option value="">All Ratings</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
        </div>
    </div>

    {{-- Reviews List --}}
    <div class="divide-y divide-gray-100 relative">
        
        {{-- Loading State --}}
        <div wire:loading.flex class="absolute inset-0 bg-white/60 z-10 items-center justify-center">
            <div class="text-blue-500 font-bold animate-pulse">Updating...</div>
        </div>

        @forelse($reviews as $review)
            {{-- هنا درنا شرط: إيلا كان مخفي (Banned) كيبان بالأحمر، وإيلا عادي كيبان أبيض --}}
            <div class="p-6 transition group {{ $review->is_active ? 'hover:bg-gray-50 bg-white' : 'bg-red-50/30 border-l-4 border-red-500' }}">
                
                <div class="flex justify-between items-start mb-3">
                    {{-- User Info --}}
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 {{ $review->is_active ? 'bg-blue-100 text-blue-600' : 'bg-red-200 text-red-600' }} rounded-full flex items-center justify-center font-bold text-sm uppercase">
                            {{ substr($review->user->name ?? 'GU', 0, 2) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">{{ $review->user->name ?? 'Unknown User' }}</h4>
                            <p class="text-xs text-gray-500">
                                {{ $review->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Comment Body --}}
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    {{ $review->comment }}
                </p>

                {{-- Actions Buttons --}}
                <div class="flex justify-end gap-2 opacity-50 group-hover:opacity-100 transition-opacity">

                    {{-- Delete Button --}}
                    <button wire:click="delete({{ $review->id }})"
                            wire:confirm="Are you sure you want to delete this review?"
                            class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg text-xs font-bold flex items-center gap-2 transition">
                        <i class="fa-solid fa-trash-can"></i> Delete
                    </button>
                </div>
            </div>
        @empty
            <div class="p-10 text-center text-gray-500">
                <i class="fa-regular fa-comment-dots text-4xl mb-3 text-gray-300"></i>
                <p>No reviews found.</p>
            </div>
        @endforelse

    </div>

    {{-- Pagination Footer --}}
    <div class="p-4 border-t border-gray-100 bg-gray-50 flex justify-center">
        {{ $reviews->links() }} 
    </div>
</div>