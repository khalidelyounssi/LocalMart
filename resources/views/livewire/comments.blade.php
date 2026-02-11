<div>
    {{-- Comment form --}}
    <form wire:submit.prevent="addComment">
        <textarea wire:model="commentText" placeholder="Write a comment..." class="w-full p-2 border rounded"></textarea>
        @error('commentText') <span class="text-red-500">{{ $message }}</span> @enderror
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Add Comment</button>
    </form>

    {{-- Display comments --}}
    <div class="mt-4">
        @foreach($comments as $comment)
            <div class="border-b py-2">
                <strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}
            </div>
        @endforeach
    </div>
</div>

