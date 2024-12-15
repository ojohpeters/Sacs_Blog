
<x-base>
    <div class="container w-full md:max-w-3xl mx-auto pt-20">

		<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

			<!--Title-->
			<div class="font-sans">
			
						<h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ strip_tags($post->Title) }}<h1>
						<p class="text-sm md:text-base font-normal text-gray-600">Published 12 December 2024</p>
			</div>


			<!--Post Content-->


			<!--Lead Para-->
			<p class="py-6">
                👋 Welcome to the SACS Blog! Whether you're a student, teacher, or someone interested in learning, this blog serves as a platform for sharing knowledge and insights on a variety of topics.
            </p>
            
            <p class="py-6">
                This is the first post in our journey to build this blog. The layout is built using the default Tailwind CSS classes, and while some style tags are hardcoded, we encourage you to explore and convert them into reusable components for your own projects.
            </p>
            
            <h1 class="py-2 font-sans text-xl">Introduction to Web Development</h1>
            <h2 class="py-2 font-sans text-lg">Why Learn Web Development?</h2>
            <h3 class="py-2 font-sans text-base">Key Skills for Beginners</h3>
            <h4 class="py-2 font-sans text-sm">HTML: The Foundation of Web Pages</h4>
            <h5 class="py-2 font-sans text-xs">CSS: Styling Your Web Pages</h5>
            <h6 class="py-2 font-sans text-xxs">JavaScript: Making Your Site Interactive</h6>
            
            <p class="py-6">
                Web development is a valuable skill that allows you to create dynamic and interactive websites. It combines creative design with technical knowledge to build functional web applications. Learning the basics of HTML, CSS, and JavaScript can provide you with a solid foundation to start building your own websites.
            </p>
            
            <ol>
                <li class="py-3">HTML is the building block of web development. It defines the structure of web pages using tags and elements.</li>
                <li class="py-3">CSS is used to style HTML elements and make websites visually appealing. It controls the layout, colors, fonts, and more.</li>
                <li class="py-3">JavaScript is a programming language that adds interactivity to websites. With it, you can create dynamic content such as animations, forms, and much more.</li>
            </ol>
            
            <blockquote class="border-l-4 border-green-500 italic my-8 pl-8 md:pl-12">
                "The web is the most powerful platform for learning. Embrace it, and you can build anything." – Anonymous
            </blockquote>
            
            <p class="py-6">
                Here’s an example of how to structure a simple webpage using HTML:
            </p>
        @verbatim
            <pre class="bg-gray-900 rounded text-white font-mono text-base p-2 md:p-4">
                <code class="break-words whitespace-pre-wrap">
            &lt;header class="site-header outer"&gt;
                &lt;div class="inner"&gt;
                    {{&gt; "site-nav"}}
                &lt;/div&gt;
            &lt;/header&gt;
                </code>
            </pre>
        @endverbatim    
            
            
			<!--/ Post Content-->

		</div>

		<!--Tags -->
		<div class="text-base md:text-sm text-gray-500 px-4 py-6">
			Tags: <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a> . <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a>
		</div>

		<!--Divider-->
		<hr class="border-b-2 border-gray-400 mb-8 mx-4">


		<!--Subscribe-->
		<div class="container px-4">
			<div class="font-sans bg-gradient-to-b from-green-100 to-gray-100 rounded-lg shadow-xl p-4 text-center">
				<h2 class="font-bold break-normal text-xl md:text-3xl">Subscribe to our Newsletter</h2>
				<h3 class="font-bold break-normal text-gray-600 text-sm md:text-base">Get the latest posts delivered right to your inbox</h3>
				<div class="w-full text-center pt-4">
					<form action="#">
						<div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
							<input type="email" placeholder="youremail@example.com" class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
							<button type="submit" class="flex-1 mt-4 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Subscribe-->



		<!--Author-->
		<div class="flex w-full items-center font-sans px-4 py-12">
			<img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
			<div class="flex-1 px-2">
				<p class="text-base font-bold text-base md:text-xl leading-none mb-2">Peters</p>
				<p class="text-gray-600 text-xs md:text-base">Minimal Blog Site <a class="text-green-500 no-underline hover:underline" href="https://www.x.com/_smok3scr33n">Peters</a></p>
			</div>
			<div class="justify-end">
				<button class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Read More</button>
			</div>
		</div>
		<!--/Author-->

		<!--Divider-->
		<hr class="border-b-2 border-gray-400 mb-8 mx-4">

		<!--Next & Prev Links-->
		<div class="font-sans flex justify-between content-center px-4 pb-12">
			<div class="text-left">
				<span class="text-xs md:text-sm font-normal text-gray-600">&lt; Previous Post</span><br>
				<p><a href="#" class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog title</a></p>
			</div>
			<div class="text-right">
				<span class="text-xs md:text-sm font-normal text-gray-600">Next Post &gt;</span><br>
				<p><a href="#" class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog title</a></p>
			</div>
		</div>


		<!--/Next & Prev Links-->

	</div>
	<!--/container-->
</x-base>