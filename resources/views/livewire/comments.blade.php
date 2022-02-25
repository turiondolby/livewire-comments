<section>
    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
        <div class="divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900">Comments</h2>
            </div>
            <div class="px-4 py-6 sm:px-6">
                <div class="space-y-8">
                    @forelse($comments as $comment)
                        <livewire:comment :comment="$comment" :key="$comment->id"/>
                    @empty
                        <p>No comments yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-6 sm:px-6">
            @auth
                <div class="flex">
                <div class="flex-shrink-0 mr-4">
                    <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatar() }}" alt="{{ auth()->user()->name }}">
                </div>
                <div class="min-w-0 flex-1">
                    <form wire:submit.prevent="postComment">
                        <div>
                            <label for="comment" class="sr-only">Comment body</label>
                            <textarea id="comment" name="comment" rows="3"
                                      class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md
                                        @error('newCommentState.body') border-red-500 @enderror"
                                      placeholder="Write something" wire:model.defer="newCommentState.body"></textarea>
                            @error('newCommentState.body')
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
                </div>
            </div>
            @endauth

            @guest
                <p>Log in to comment.</p>
            @endguest
        </div>
    </div>
</section>
