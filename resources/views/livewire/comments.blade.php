<div class="mt-12 bg-white rounded-3xl shadow-sm border p-8">

    {{-- Title --}}
    <h3 class="text-xl font-semibold mb-6">Customer Reviews</h3>

    {{-- Review Form --}}
    <form wire:submit.prevent="addComment" class="space-y-4">

        {{-- Comment textarea --}}
        <textarea
            wire:model.defer="commentText"
            class="w-full p-4 border rounded-2xl focus:ring-2 focus:ring-black focus:outline-none"
            rows="4"
            placeholder="Write your comment..."></textarea>
        @error('commentText')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        {{-- Star Rating --}}
        <div class="flex gap-2 text-3xl cursor-pointer">
            @for($i = 1; $i <= 5; $i++)
                <span wire:click.prevent="$set('rating', {{ $i }})">
                    <i class="fa-{{ $i <= $rating ? 'solid' : 'regular' }} fa-star text-yellow-400 transition hover:scale-110"></i>
                </span>
            @endfor
        </div>
        @error('rating')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        {{-- Submit button --}}
        <button type="submit"
            class="bg-black text-white px-6 py-3 rounded-2xl hover:opacity-90 transition">
            Submit Comment
        </button>
    </form>

    {{-- Reviews List --}}
    <div class="mt-10 space-y-6">
        @forelse($comments as $comment)
            <div class="border-b pb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-semibold text-gray-800">{{ $comment->user->name }}</span>
                    <div class="text-yellow-400">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa-{{ $i <= $comment->rating ? 'solid' : 'regular' }} fa-star"></i>
                        @endfor
                    </div>
                </div>

                <p class="text-gray-600">{{ $comment->comment }}</p>
                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
        @empty
            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
        @endforelse
    </div>

</div>
