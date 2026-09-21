<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- CARD -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <!-- HEADER -->
                <div class="p-6 border-b border-gray-100">

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-3">
                            <img class="w-11 h-11 rounded-full object-cover border"
                                src="https://ui-avatars.com/api/?name={{ $post->user->name }}"
                                alt="{{ $post->user->name }}">

                            <div>
                                <a href="{{ route('profile.show', $post->user) }}"
                                    class="font-semibold text-gray-900 hover:text-blue-600 transition">
                                    {{ $post->user->name }}
                                </a>

                                <div class="text-xs text-gray-500">
                                    {{ $post->created_at->format('M d, Y') }}
                                </div>
                            </div>
                        </div>

                        <!-- CATEGORY -->
                        <span class="text-xs px-3 py-1 bg-gray-100 rounded-full text-gray-600">
                            {{ $post->category->name }}
                        </span>

                    </div>
                </div>

                <!-- TITLE -->
                <div class="px-6 pt-6">
                    <h1 class="text-3xl font-bold text-gray-900 leading-tight">
                        {{ $post->title }}
                    </h1>
                </div>

                <!-- IMAGE -->
                @if ($post->image)
                    <div class="flex justify-center bg-gray-50">
                        <img src="{{ $post->imageUrl() }}" class="max-h-[400px] w-auto object-contain rounded-xl"
                            alt="{{ $post->title }}">
                    </div>
                @endif

                <!-- CONTENT -->
                <div class="px-6 py-6">
                    <div class="prose max-w-none text-gray-700 leading-relaxed">
                        {{ $post->content }}
                    </div>
                </div>

                <!-- ACTIONS -->
                @if ($post->user_id === Auth::id())
                    <div class="px-6 py-4 border-t border-gray-100 flex gap-3">

                        <a href="{{ route('post.edit', $post->slug) }}"
                            class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700 transition">
                            Edit
                        </a>

                        <form action="{{ route('post.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="px-4 py-2 rounded-lg bg-red-600 text-white text-sm hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>

                    </div>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>