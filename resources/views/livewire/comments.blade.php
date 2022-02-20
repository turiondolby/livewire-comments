<section>
    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
        <div class="divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900">Comments</h2>
            </div>
            <div class="px-4 py-6 sm:px-6">
                <div class="space-y-8">
                    {{-- Start comment --}}
                    <div>
                        <div class="flex">
                            <div class="flex-shrink-0 mr-4">
                                <img class="h-10 w-10 rounded-full" src="" alt="">
                            </div>
                            <div class="flex-grow">
                                <div>
                                    <a href="#" class="font-medium text-gray-900">User name</a>
                                </div>
                                <div class="mt-1 flex-grow w-full">
                                    <p class="text-gray-700">Comment body</p>
                                </div>
                                <div class="mt-2 space-x-2">
                                    <span class="text-gray-500 font-medium">Created at date</span>
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
                    {{-- End comment --}}
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
                    <form>
                        <div>
                            <label for="comment" class="sr-only">Comment body</label>
                            <textarea id="comment" name="comment" rows="3"
                                      class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md"
                                      placeholder="Write something"></textarea>
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
