<x-app-layout>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>

        <div class="w-full md:w-2/3 relative">
            <input type="search" placeholder="Find an Idea" class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none placeholder-text-gray-900">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->

    <div class="ideas-container space-y-6 my-6">
        @foreach($ideas as $idea)
        <div 
            x-data
            @click="
                clicked = $event.target
                target =  clicked.tagName.toLowerCase()

                ignores = ['button', 'svg', 'path', 'a']  

                if (! ignores.includes(target)) {
                 clicked.closest('.idea-container').querySelector('.idea-link').click()
                }
            "
            class="idea-container hover:shadow-card bg-white 
            rounded-xl flex transition duration-150 ease-in cursor-pointer">
            <div class="hidden md:block border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400
                    transition duration-150 ease-in font-bold text-xxs uppercase rounded-xl px-4 py-3">
                        Vote 
                    </button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                <div class="flex-none md:mx-0">
                    <a href="#">
                        <img src="data:image/jpeg;base64,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" class="w-14 h-14 rounded-xl" alt="avatar">
                    </a>

                </div>
                <div class="w-full mx-4 flex flex-col justify-between ">
                    <h4 class="text-xl font-semibold mt-2 md:mt-0">
                        <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        {{ $idea->description }}
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>{{ $idea->created_at->diffForhumans() }}</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div 
                            x-data="{isOpen: false}"
                            class="flex items-center space-x-2 mt-2 md:mt-0 ">
                            <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                            <button 
                                @click="isOpen = !isOpen"
                                class="relative bg-gray-100 hover:bg-gray-200 
                                rounded-full h-7 transition duration-150 ease-in px-3 border">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul
                                    class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                    x-cloak
                                    x-show="isOpen"
                                    x-transition.origin.top.left.duration.500ms
                                    @click.away ="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute w-44 font-semibold bg-white rounded-xl py-3 text-left shadow-dialog md:ml-8 md:top-6 right-0 md:left-0"
                                > 		

                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>

                        <div class="flex items-center md:hidden mt-4">
                            <div class="bg-gray-100 text-center text-sm rounded-full h-10 px-4 py-2 pr-9">
                                <div class="text-sm font-bold leading-none">12</div>
                                <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                            </div>
                            <button class="w-18 h-10 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-full hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-7">
                                Vote
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- end idea container -->
        @endforeach
    </div> <!-- end ideas container -->

    <div class="my-8">
        {{ $ideas->links() }}
    </div>
</x-app-layout>
