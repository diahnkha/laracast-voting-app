<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <span class="ml-2">All Ideas</span>
        </a>
    </div>
    <div class="idea-container rounded-xl flex  mt-4">
            
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none mx-2 md:mx-0">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&v=3" class="w-14 h-14 rounded-xl" alt="avatar">
                    </a>

                </div>
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">{{ $idea->title }}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 ">
                        {{ $idea->description }}
                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-between mt-6 mx-2 md:mx-4 ">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">{{ $idea->user?->name }} </div>
                            <div>&bull;</div>
                            <div>{{ $idea->created_at->diffForhumans() }}</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-4 md:mt-0 ">
                            <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                            <button 
                                @click="isOpen = !isOpen"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 
                                transition duration-150 ease-in px-3 border">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul
                                    x-cloak
                                    x-show="isOpen"
                                    x-transition.origin.top.left.duration.500ms
                                    @click.away ="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute w-44 font-semibold bg-white rounded-xl py-3 text-left shadow-dialog 
                                    md:ml-8 md:top-6 right-0 md:left-0"
                                > 		

                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>

                        <div class="hidden items-center md:flex space-x-3">
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

        <div class="buttons-container flex items-center justify-between mt-6">
            <div class="flex flex-col md:flex-row items-center space-x-4 ml-6">
                <div class="relative"
                    x-data="{isOpen : false}">

                    <button 
                        type="button"
                        @click="isOpen = !isOpen"
                        type="button"
                        class="flex items-center justify-center w-1/2 h-11 text-sm bg-blue 
                                    font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in
                                    px-6 py-3 text-white"
                    >
                        Reply
                    </button> 
                    <div 
                        x-cloak
                        x-show="isOpen"
                        x-transition.origin.top.left.duration.500ms
                        @click.away ="isOpen = false"
                        @keydown.escape.window="isOpen = false"
                        class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                        <form action="#" class="space-y-4 px-4 py-6">
                            <div>
                                <textarea name="post_comment" id="post_comment" cols="30" rows="10" 
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Go Ahead, dont be shy, Share your thoughts"></textarea>
                            </div>

                            <div class="flex flex-col md:flex-row items-center md:space-x-3">
                                <button 
                                    type="button"
                                    class="flex items-center justify-center w-32 h-11 text-sm bg-blue w-full md:1/2
                                                font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in
                                                px-6 py-3 text-white"
                                >
                                    Post Comment
                                </button> 
                                <button 
                                type="button"
                                class="flex items-center justify-center w-full h-11 md:w-32 text-xs bg-gray-200
                                font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in
                                px-6 py-3 mt-2 md:mt-0"
                            >
                                <svg class="text-gray-500 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                            </div>

                        </form>
                    </div>
                </div>

                <div 
                    class="relative"
                    x-data="{isOpen : false}"
                >
                    

                    <button 
                        type="button"
                        @click="isOpen = !isOpen"
                        class="flex items-center justify-center w-36 h-11 w-36 text-sm bg-gray-200
                        font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in
                        px-6 py-3 mt-2 md:mt-0"
                    >
                    
                    <span class="mr-1">Set Status </span>
                        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    </button> 
                    <div 
                        x-cloak
                        x-show="isOpen"
                        x-transition.origin.top.left.duration.500ms
                        @click.away ="isOpen = false"
                        @keydown.escape.window="isOpen = false"
                        class="absolute z-20 w-64 md:w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                        <form action="#" class="space-y-4 px-4 py-6">
                            <div class="space-y-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" checked="" class="bg-slate-200 text-black border-none" name="radio-direct" value="1">
                                        <span class="ml-2">Open</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" checked="" class="bg-slate-200 text-purple border-none" name="radio-direct" value="2">
                                        <span class="ml-2">Consideration</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" checked="" class="bg-slate-200 text-yellow border-none" name="radio-direct" value="3">
                                        <span class="ml-2">In Progress</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" checked="" class="bg-slate-200 text-green border-none" name="radio-direct" value="4">
                                        <span class="ml-2">Implemented</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" checked="" class="bg-slate-200 text-red border-none" name="radio-direct" value="5">
                                        <span class="ml-2">Closed</span>
                                    </label>
                                </div>
                                
                            </div>
    
                            <div>
    
                                <textarea name="update_comment" id="update_comments" cols="30" rows="3"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none 
                                px-4 py-2" placeholder="add an update comment (optional)"></textarea>
                            </div>

                            <div class="flex items-center justify-between space-x-3">
                                <button 
                                    type="button"
                                    class="flex items-center justify-center w-1/2 h-11 w-32 text-xs bg-gray-200
                                    font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in
                                    px-6 py-3"
                                >
                                    <svg class="text-gray-500 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                    </svg>

                                    <span class="ml-1">Attach</span>
                                </button>
                                <button 
                                    type="submit"
                                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue 
                                    font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in
                                    px-6 py-3 text-white"
                                >


                                    <span class="ml-1">Update</span>
                                </button> 
                        </div>

                        <div>
                            <label class="font-normal inline-flex items-center">
                                <input type="checkbox" class="rounded bg-gray-200" checked="" name="notify_voters">
                                <span class="ml-2">Notify All Voters</span>
                            </label>
                        </div>
    
                        </form>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex flex items-center space-x-3 ">
                <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                    <div class="text-xl leading-snug">12</div>
                    <div class="text-gray-400 text-xs leading-none">
                        Votes
                    </div>
                </div>
                <button 
                    type="button"
                    class=" w-32 h-11 w-36 text-xs bg-gray-200
                    font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in
                    px-6 py-3 uppercase"
                >
                
                <span>VOTE</span>


            </div>
        </div> <!-- end buttons container -->
        <div class="comments-container relative space-y-6 md:ml-22 pt-4 my-8 mt-1">
            <div class="comment-container relative rounded-xl flex  mt-4">
                
                <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                    <div class="flex-none mx-2 md:mx-4">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&v=2" class="w-14 h-14 rounded-xl" alt="avatar">
                        </a>

                    </div>
                    <div class="w-full mx-2 md:mx-4">
                        <!-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title can go here</a>
                        </h4> -->
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                        <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div class="hidden md:block font-bold text-gray-900">John Doe</div>
                                <div class="hidden md:block">&bull;</div>
                                <div>10 Hours ago</div>
                  
                            </div>
                            <div class="flex items-center space-x-2">

                                <button 
                                
                                    class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in px-3 border">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    <ul class="hidden absolute w-64 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8">
                                        <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end comment-container -->
            <div class="is-admin comment-container relative rounded-xl flex  mt-4">
                
                <div class="flex flex-1 px-4 py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&v=4" class="w-14 h-14 rounded-xl" alt="avatar">
                        </a>
                        <div class="text-center text-blue uppercase text-xxs font-bold">Admin</div>

                    </div>
                    <div class="w-full mx-4">
                        <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">Status Changed to "Under Consideration"</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div class="font-bold text-blue">Andreaa</div>
                                <div>&bull;</div>
                                <div>10 Hours ago</div>
                  
                            </div>
                            <div class="flex items-center space-x-2">

                                <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in px-3 border">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    <ul 
                                        x-cloak
                                        x-show="isOpen"
                                        x-transition.origin.top.left.duration.500ms
                                        @click.away ="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="absolute w-64 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8">
                                        <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end comment-container -->
            <div class="comment-container relative rounded-xl flex  mt-4">
                
                <div class="flex flex-1 px-4 py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&v=2" class="w-14 h-14 rounded-xl" alt="avatar">
                        </a>

                    </div>
                    <div class="w-full mx-4">
                        <!-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title can go here</a>
                        </h4> -->
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 Hours ago</div>
                  
                            </div>
                            <div class="flex items-center space-x-2">

                                <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in px-3 border">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    <ul class="hidden absolute w-64 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8">
                                        <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end comment-container -->
            
        </div> <!-- end comments-container -->
</x-app-layout>
