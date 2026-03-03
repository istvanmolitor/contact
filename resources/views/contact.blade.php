@extends('cms::layouts.default')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Kapcsolat</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Név</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">E-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full px-3 py-2 border rounded @error('email') border-red-500 @enderror" required>
            @error('email')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="message" class="block text-gray-700 font-bold mb-2">Üzenet</label>
            <textarea name="message" id="message" rows="5"
                class="w-full px-3 py-2 border rounded @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
            @error('message')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Küldés
        </button>
    </form>
</div>
@endsection
