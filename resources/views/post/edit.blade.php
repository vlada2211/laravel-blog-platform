<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4">

            <div class="bg-white shadow-sm rounded-2xl p-6 border">

                <!-- TITLE -->
                <h1 class="text-2xl font-bold mb-6">
                    ✏️ Edit Post
                </h1>

                <form method="POST" action="{{ route('post.update', $post->slug) }}" enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf
                    @method('PATCH')

                    <!-- TITLE -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">
                            Title
                        </label>

                        <input type="text" name="title" value="{{ old('title', $post->title) }}"
                            class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- CONTENT -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">
                            Content
                        </label>

                        <textarea name="content" rows="6"
                            class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <!-- IMAGE -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">
                            Cover Image
                        </label>

                        <input type="file" id="image" name="image" class="block w-full text-sm">

                        <!-- PREVIEW -->
                        <div class="mt-4 flex justify-center">
                            <img id="preview" src="{{ $post->imageUrl() }}"
                                class="max-h-[250px] rounded-xl shadow-sm object-contain">
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <div class="flex justify-between items-center">

                        <a href="{{ url()->previous() }}" class="text-gray-500 hover:underline">
                            ← Back
                        </a>

                        <button class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
                            💾 Save changes
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

    <!-- PREVIEW SCRIPT -->
    <script>
        document.getElementById('image').addEventListener('change', function (e) {
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('preview').src = e.target.result;
            }

            reader.readAsDataURL(this.files[0]);
        });
    </script>
</x-app-layout>