<div class="mt-12 bg-white rounded-3xl shadow-sm border p-8">
    <h3 class="text-xl font-semibold mb-6">Customer Reviews</h3>

    {{-- form Only shown if user ordered the product --}}
    @if($canComment)
    <form wire:submit.prevent="addComment" class="space-y-4 mb-10">
        <textarea wire:model="commentText" class="w-full p-4 border rounded-2xl focus:ring-2 focus:ring-black focus:outline-none" rows="3" placeholder="Write your comment..."></textarea>

        <div class="flex items-center gap-4">
            <div class="flex gap-1 text-2xl">
                @for($i = 1; $i <= 5; $i++)
                    <button type="button" wire:click="setRating({{ $i }})" class="focus:outline-none">
                    <i class="fa-{{ $i <= $rating ? 'solid' : 'regular' }} fa-star {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                    </button>
                    @endfor
            </div>
            <button type="submit" class="bg-black text-white px-6 py-2 rounded-xl hover:bg-gray-800 transition">Publish</button>
        </div>
        @error('rating') <span class="text-red-500 text-xs">Please select a rating</span> @enderror
    </form>
    @else
    <div class="bg-gray-50 border border-dashed rounded-2xl p-6 mb-10 text-center">
        <p class="text-gray-500 text-sm">
            <i class="fa-solid fa-lock mr-2"></i>
            Only customers who purchased this product can leave a review.
        </p>
    </div>
    @endif

    <div class="space-y-8">
        @forelse($comments as $comment)
        <div class="border-b pb-6 last:border-0">
            <div class="flex justify-between items-start">
                <div>
                    <div class="flex items-center gap-3">
                        {{-- user name --}}
                        <span class="font-bold text-gray-900">{{ $comment->user->name }}</span>

                        <div class="flex text-xs text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa-{{ $i <= $comment->rating ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 mt-2">{{ $comment->comment }}</p>
                    <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                </div>

               
                <button wire:click="reportComment({{ $comment->id }})" class="text-gray-400 hover:text-red-500 text-sm flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation"></i> Report
                </button>
               
            </div>
        </div>
        @empty
        <p class="text-gray-400 text-center">No reviews yet.</p>
        @endforelse
    </div>
</div>