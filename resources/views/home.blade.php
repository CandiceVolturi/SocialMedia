<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Home</a>
            <a href="{{ route('posts.create') }}" class="text-blue-500 hover:text-blue-700">+ Buat Post</a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Post</h1>

        <form method="GET" action="{{ route('home') }}" class="mb-6 flex flex-col md:flex-row gap-4">
            <input type="text" name="search" placeholder="Cari judul..." value="{{ request('search') }}" class="w-full md:w-1/2 px-4 py-2 border rounded">
            <input type="number" name="user_id" placeholder="Filter User ID" value="{{ request('user_id') }}" class="w-full md:w-1/4 px-4 py-2 border rounded">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
        </form>

        @foreach($posts as $post)
            <div class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold text-blue-700">
                    <a href="{{ route('posts.show', $post['id']) }}">{{ $post['title'] }}</a>
                </h2>
                <p class="text-gray-600 mt-1">{{ Str::limit($post['body'], 100) }}</p>
                <a href="{{ route('users.show', $post['userId']) }}" class="text-sm text-blue-500">Lihat profil user</a>
            </div>
        @endforeach

        <div class="mt-6">
            @php $lastPage = ceil($total / 10); @endphp
            <div class="flex gap-2">
                @for ($i = 1; $i <= $lastPage; $i++)
                    <a href="?page={{ $i }}" class="px-3 py-1 border rounded {{ $i == $page ? 'bg-blue-500 text-white' : '' }}">{{ $i }}</a>
                @endfor
            </div>
        </div>
    </div>

</body>
</html>
