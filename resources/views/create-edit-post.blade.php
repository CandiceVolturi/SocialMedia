<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($post) ? 'Edit Post' : 'Buat Post' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Home</a>
        </div>
    </nav>

    <div class="max-w-xl mx-auto px-4 py-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6">
            {{ isset($post) ? 'Edit Post' : 'Buat Post Baru' }}
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ isset($post) ? route('posts.update', $post['id']) : route('posts.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Judul</label>
                <input type="text" name="title" value="{{ old('title', $post['title'] ?? '') }}"
                    class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Isi</label>
                <textarea name="body" rows="6" class="w-full px-4 py-2 border rounded" required>{{ old('body', $post['body'] ?? '') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                {{ isset($post) ? 'Update' : 'Simpan' }}
            </button>
        </form>
    </div>

</body>
</html>
