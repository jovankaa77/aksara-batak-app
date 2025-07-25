@extends('layouts.admin-layout')

@section('title', $isEdit ? 'Edit Post' : 'Buat Post Baru')

@section('head-scripts')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto bg-bg-dark text-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6 text-accent-teal">
            {{ $isEdit ? 'Edit Post' : 'Tulis Post Baru' }}
        </h1>

        <form method="POST" enctype="multipart/form-data"
            action="{{ $isEdit ? route('admin.posts.update', $post) : route('admin.posts.store') }}" class="space-y-6">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <!-- Judul -->
            <div>
                <label for="title" class="block font-semibold mb-1 text-accent-teal">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal"
                    required>
            </div>

            <!-- Preview -->
            <div id="preview-container" class="mb-4">
                @if ($isEdit && !empty($post->thumbnail))
                    <p class="text-sm text-gray-300 mb-1">Gambar saat ini:</p>
                    <img id="thumbnail-preview" src="{{ $post->thumbnail }}" alt="Thumbnail" class="w-48 rounded shadow">
                @else
                    <img id="thumbnail-preview" class="w-48 rounded shadow hidden" />
                @endif
            </div>

            <!-- Upload Button with Custom Label -->
            <label for="thumbnail"
                class="flex items-center bg-gray-800 hover:bg-gray-700 text-white text-base font-medium px-4 py-2.5 rounded w-max cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mr-2 fill-white" viewBox="0 0 32 32">
                    <path
                        d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z" />
                    <path
                        d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z" />
                </svg>
                Upload Gambar
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="hidden" />
            </label>


            <!-- Konten -->
            <div>
                <label for="body" class="block font-semibold mb-1 text-accent-teal">Konten</label>
                <textarea name="body" id="body" class="hidden">{{ old('body', $post->body ?? '') }}</textarea>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <input type="hidden" name="is_published" id="is_published" value="false">
                <button type="submit"
                    class="bg-accent-yellow hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg transition">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Post
                </button>

                <button type="submit" onclick="document.getElementById('is_published').value = 'true'"
                    class="bg-accent-teal hover:bg-teal-500 text-black font-semibold px-6 py-2 rounded-lg transition">
                    Publikasikan Sekarang
                </button>
            </div>
        </form>
    </div>


    <script>
        const supabaseClient = supabase.createClient(
            "{{ env('SUPABASE_BASE_URL') }}",
            "{{ env('SUPABASE_SERVICE_ROLE_KEY') }}"
        );

        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: 'textarea#body',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | image link | code',
                height: 400,
                menubar: false,
                branding: false,
                skin: "oxide-dark",
                content_css: "dark",
                license_key: 'gpl',
            });

        });

        document.addEventListener('DOMContentLoaded', () => {
            const fileInput = document.getElementById('thumbnail');
            const previewImage = document.getElementById('thumbnail-preview');

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (!file) return;

                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
