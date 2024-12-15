<x-base>
    <form action="{{ route('addpost') }}" method="POST" id="postForm" novalidate>
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ old('title') }}">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
            <!-- This textarea will be replaced by TinyMCE -->
            <textarea name="content" id="content" rows="10" class="w-full border rounded p-2" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
    </form>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        // Initialize TinyMCE
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
                // On form submit, copy TinyMCE content back to the original textarea
                editor.on('change', function () {
                    tinyMCE.triggerSave(); // Save content back to the textarea
                });
            }
        });

        // Ensure the content is saved before form submission
        document.getElementById('postForm').addEventListener('submit', function (e) {
            // Trigger save to ensure content from TinyMCE is copied back to the textarea
            tinyMCE.triggerSave();
        });
    </script>
</x-base>
