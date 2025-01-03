<x-base>
    <section id="features" class="container mx-auto px-4 space-y-6 bg-slate-50 py-8 md:py-12 lg:py-20">

        <div class="mx-auto flex max-w-[58rem] flex-col items-center space-y-4 text-center">
            <div class="flex items-center justify-center gap-4">
                <h2 class="font-bold text-3xl leading-[1.1] sm:text-3xl md:text-6xl flex items-center">
                    Share Ideas
                </h2>
                <div class="flex gap-2  pt-6 items-center">
                    <div class="w-5 h-5 rounded-full animate-pulse bg-blue-600"></div>
                    <div class="w-5 h-5 rounded-full animate-pulse bg-blue-600"></div>
                    <div class="w-5 h-5 rounded-full animate-pulse bg-blue-600"></div>
                </div>
            </div>
        
            <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7">
                Welcome To The BlogSite {{ auth()->user()->name ?? 'Guest' }}
            </p>
        </div>
        
        @if ($posts->isEmpty())
            <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3">
                <div
                    class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-teal-200 p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <svg viewBox="0 0 24 24" class="h-12 w-12 fill-current">
                            <path
                                d="M11.572 0c-.176 0-.31.001-.358.007a19.76 19.76 0 0 1-.364.033C7.443.346 4.25 2.185 2.228 5.012a11.875 11.875 0 0 0-2.119 5.243c-.096.659-.108.854-.108 1.747s.012 1.089.108 1.748c.652 4.506 3.86 8.292 8.209 9.695.779.25 1.6.422 2.534.525.363.04 1.935.04 2.299 0 1.611-.178 2.977-.577 4.323-1.264.207-.106.247-.134.219-.158-.02-.013-.9-1.193-1.955-2.62l-1.919-2.592-2.404-3.558a338.739 338.739 0 0 0-2.422-3.556c-.009-.002-.018 1.579-.023 3.51-.007 3.38-.01 3.515-.052 3.595a.426.426 0 0 1-.206.214c-.075.037-.14.044-.495.044H7.81l-.108-.068a.438.438 0 0 1-.157-.171l-.05-.106.006-4.703.007-4.705.072-.092a.645.645 0 0 1 .174-.143c.096-.047.134-.051.54-.051.478 0 .558.018.682.154.035.038 1.337 1.999 2.895 4.361a10760.433 10760.433 0 0 0 4.735 7.17l1.9 2.879.096-.063a12.317 12.317 0 0 0 2.466-2.163 11.944 11.944 0 0 0 2.824-6.134c.096-.66.108-.854.108-1.748 0-.893-.012-1.088-.108-1.747-.652-4.506-3.859-8.292-8.208-9.695a12.597 12.597 0 0 0-2.499-.523A33.119 33.119 0 0 0 11.573 0zm4.069 7.217c.347 0 .408.005.486.047a.473.473 0 0 1 .237.277c.018.06.023 1.365.018 4.304l-.006 4.218-.744-1.14-.746-1.14v-3.066c0-1.982.01-3.097.023-3.15a.478.478 0 0 1 .233-.296c.096-.05.13-.054.5-.054z">
                            </path>
                        </svg>
                        <div class="space-y-0">
                            <h3 class="font-bold">No Posts</h3>
                            <p class="text-sm text-muted-foreground">No posts At The Moment...</p>
                            @guest
                                <p class="text-sm text-muted-foreground"> <a
                                        class="text-sky-500 transition-all duration-300 group-hover:text-white"
                                        href="{{ route('create.user') }}">Register </a> Or <a
                                        class="text-sky-500 transition-all duration-300 group-hover:text-white"
                                        href="{{ route('login') }}">Login</a> to create one...</p>
                            @endguest

                            <div class="text-base font-semibold leading-7">
                                <p>
                                    <a href="{{ route('addpost') }}"
                                        class="text-sky-500 transition-all duration-300 group-hover:text-white">Add a
                                        Post
                                        &rarr;
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@else
        <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3">
            @foreach ($posts as $post)
                <div
                    class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-teal-200 p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-0">
                            <h3 class="font-bold">{{ strip_tags($post->Title) }}</h3>
                            <p class="text-sm text-muted-foreground">
                                {{ Str::words(strip_tags($post->MainPost), 4) }}...
                            </p>
                            
                            <p>Published by {{ $post->user->name ?? "Unknow" }} {{ $post->created_at->diffForHumans() }}</p>
                            <div class="text-base font-semibold leading-7">
                                <a href="{{ route('viewpost', $post->id) }}"
                                    class="text-sky-500 transition-all duration-300 group-hover:text-white">Read More
                                    &rarr;</a>
                                    @if ($post->user_id == auth()->id())
                                    <!-- Show content or options for the post that belongs to the current user -->
                                    <form action="{{ route('deletepost', $post->id) }}" method="POST">
                                        @csrf
                                        <button class="text-red-300 transition-all duration-300 group-hover:text-red-700">
                                            Delete Post
                                        </button>
                                    </form>
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    </div>
</x-base>
