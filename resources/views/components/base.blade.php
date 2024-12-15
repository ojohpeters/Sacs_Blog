<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title ?? 'Blogpost' }}</title>
    <meta name="author" content="name" />
    <meta name="description" content="A simple blogsite for for training on laravel" />
    <meta name="keywords" content="keywords,here" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    @vite(['public/assets/css/app.css', 'public/assets/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!--Replace with your tailwind.css once created-->
</head>


<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav id="header" class="fixed w-full z-10 top-0">

        <div id="progress" class="h-1 z-20 top-0"
            style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>

        <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">

            <div class="pl-4">
                <a class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl"
                    href="{{ route('home') }}">
                    SACS Blog
                </a>
            </div>

            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>

            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden  mt-2 lg:mt-0 bg-gray-100  z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                   
                        <li class="mr-3">
                            <a class="inline-block py-2 px-4 text-gray-900 font-bold no-underline"
                                href="{{ route('home') }}">Home</a>
                        </li>
						@auth
                        <li class="mr-3">
                            <a class="inline-block py-2 px-4 text-gray-900 font-bold no-underline"
                                href="{{ route('makepost') }}">Add Post</a>
                        </li>
                        <li
                            class="{{ request()->routeIs('home') ? 'text-blue-700 font-semibold' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button
                                    class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4"
                                    href="{{ route('logout') }}">Logout</button>
                            </form>

                        </li>
                    @endauth

                    @guest
                        <li class="mr-3">
                            <a class="{{ request()->routeIs('home') ? 'text-blue-700 font-semibold' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                                href="{{ route('create.user') }}">Register</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4"
                                href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!--Container-->
    <div class="container mx-auto mt-20 p-6 bg-white shadow-md rounded-lg max-w-5xl">
        @if (session('Success'))
            <div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"> {{ session('Success') }}</span>
            </div>
        @endif

        @if (session('Error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error:</strong>
                <span class="block sm:inline"> {{ session('Error') }}</span>
            </div>
        @endif
        {{ $slot }}

    </div>

    <footer class="bg-white border-t border-gray-400 shadow">
        <div class="container max-w-4xl mx-auto flex py-8">
    
            <div class="w-full mx-auto flex flex-wrap">
                <!-- About Section -->
                <div class="flex w-full md:w-1/2">
                    <div class="px-8">
                        <h3 class="font-bold text-gray-900">About</h3>
                        <p class="py-4 text-gray-600 text-sm">
                            Sacs~Blog is a community-driven platform where students, programmers, and enthusiasts come together 
                            to share ideas, projects, and insights about programming. Let's learn and grow together!
                        </p>
                    </div>
                </div>
    
                <!-- Social Section -->
                <div class="flex w-full md:w-1/2">
                    <div class="px-8">
                        <h3 class="font-bold text-gray-900">Connect with Us</h3>
                        <ul class="list-reset items-center text-sm pt-3">
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                    href="https://www.facebook.com/mynameojochegbe" target="_blank">
                                    <i class="fab fa-facebook mr-2"></i> Join us on Facebook
                                </a>
                            </li>
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                    href="https://www.twitter.com/_smok3scr33n" target="_blank">
                                    <i class="fab fa-twitter mr-2"></i> Follow us on Twitter
                                </a>
                            </li>
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                    href="https://discord.gg/TCjTv3Rc" target="_blank">
                                    <i class="fab fa-discord mr-2"></i> Join our Discord community
                                </a>
                            </li>
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                    href="https://www.github.com/ojohpeters" target="_blank">
                                    <i class="fab fa-github mr-2"></i> Explore our GitHub
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <script>
        /* Progress bar */
        Source: https: //alligator.io/js/progress-bar-javascript-css-variables/
            var h = document.documentElement,
                b = document.body,
                st = 'scrollTop',
                sh = 'scrollHeight',
                progress = document.querySelector('#progress'),
                scroll;
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");

        document.addEventListener('scroll', function() {

            /*Refresh scroll % width*/
            scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
            progress.style.setProperty('--scroll', scroll + '%');

            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");

            }

        });


        //Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>
  <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('js/tinymce/plugin/autoresize/plugin.min.js') }}"></script>
  <script>
      tinymce.init({
          selector: '#content', // Match the ID of your textarea
          height: 500,
          menubar: false,
          plugins: [
              'advlist autolink lists link image charmap print preview anchor',
              'searchreplace visualblocks code fullscreen',
              'insertdatetime media table paste code help wordcount'
          ],
          toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
          setup: function (editor) {
              // Trigger save to sync TinyMCE content with the underlying textarea
              editor.on('change', function () {
                  tinymce.triggerSave();
              });
          }
      });
  </script>
  


</body>

</html>
