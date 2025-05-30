<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Home</a>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-4 py-6">
        <div class="bg-white rounded shadow p-6 mb-6">
            <h1 class="text-2xl font-bold mb-2">Profil: {{ $user['name'] }}</h1>
            <p class="text-gray-600"><strong>Email:</strong> {{ $user['email'] }}</p>
            <p class="text-gray-600"><strong>Username:</strong> {{ $user['username'] }}</p>
            <p class="text-gray-600"><strong>Perusahaan:</strong> {{ $user['company']['name'] ?? '-' }}</p>
            <p class="text-gray-600"><strong>Alamat:</strong> {{ $user['address']['street'] ?? '' }}, {{ $user['address']['city'] ?? '' }}</p>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-4">Post oleh {{ $user['name'] }}</h2>
            @forelse ($posts as $post)
                <div class="bg-white rounded shadow p-4 mb-4">
                    <h3 class="text-lg font-bold text-blue-700">
                        <a href="{{ route('posts.show', $post['id']) }}">{{ $post['title'] }}</a>
                    </h3>
                    <p class="text-gray-700 mt-1">{{ Str::limit($post['body'], 100) }}</p>
                </div>
            @empty
                <p class="text-gray-600">User ini belum memiliki postingan.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
