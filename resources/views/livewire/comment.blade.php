<div>
    <div class="flex">
        <div class="flex-shrink-0 mr-4">
            <img class="h-10 w-10 rounded-full" src="{{ $comment->user->avatar() }}" alt="{{ $comment->user->name }}">
        </div>
        <div class="flex-grow">
            <div>
                <a href="#" class="font-medium text-gray-900">{{ $comment->user->name }}</a>
            </div>
            <div class="mt-1 flex-grow w-full">
                <p class="text-gray-700">{{ $comment->body }}</p>
            </div>
            <div class="mt-2 space-x-2">
                <span class="text-gray-500 font-medium">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
                <button type="button" class="text-gray-900 font-medium">
                    Reply
                </button>
                <button type="button" class="text-gray-900 font-medium">
                    Edit
                </button>
                <button type="button" class="text-gray-900 font-medium">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div class="ml-14 mt-6">
        Replies
    </div>
</div>
