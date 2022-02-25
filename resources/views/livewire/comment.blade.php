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
                @auth
                    @if (! $comment->parent_id)
                        <button wire:click="$toggle('isReplying')" type="button" class="text-gray-900 font-medium">
                            Reply
                        </button>
                    @endif
                    <button type="button" class="text-gray-900 font-medium">
                        Edit
                    </button>
                    <button type="button" class="text-gray-900 font-medium">
                        Delete
                    </button>
                @endauth
            </div>
        </div>
    </div>

    <div class="ml-14 mt-6">
        @if ($isReplying)
            <form wire:submit.prevent="postReply">
                <div>
                    <label for="comment" class="sr-only">Reply body</label>
                    <textarea id="comment" name="comment" rows="3"
                              class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md
                                        @error('replyState.body') border-red-500 @enderror"
                              placeholder="Write something" wire:model.defer="replyState.body"></textarea>
                    @error('replyState.body')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3 flex items-center justify-between">
                    <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Comment
                    </button>
                </div>
            </form>
        @endif

        @foreach ($comment->children as $child)
            <livewire:comment :comment="$child" :key="$child->id"/>
        @endforeach
    </div>
</div>
