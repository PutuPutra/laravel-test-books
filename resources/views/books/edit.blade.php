@extends('layouts.app')
@section('title', __('messages.edit_books'))
@section('content')
    <div class="bg-gray-100 shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-700 mb-6">{{ __('messages.edits book') }}</h1>
        <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-lg font-semibold text-gray-700">{{ __('messages.title') }}</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-300 py-3 px-4">
                    @error('title')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="serial_number"
                        class="block text-lg font-semibold text-gray-700">{{ __('messages.serial_number') }}</label>
                    <input type="text" name="serial_number" id="serial_number"
                        value="{{ old('serial_number', $book->serial_number) }}"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-300 py-3 px-4">
                    @error('serial_number')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="published_at"
                        class="block text-lg font-semibold text-gray-700">{{ __('messages.published_at') }}</label>
                    <input type="date" name="published_at" id="published_at"
                        value="{{ old('published_at', $book->published_at) }}"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-300 py-3 px-4">
                    @error('published_at')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="author_id"
                        class="block text-lg font-semibold text-gray-700">{{ __('messages.author') }}</label>
                    <select name="author_id" id="author_id"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-300 py-3 px-4">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ $author->id == old('author_id', $book->author_id) ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('books.index') }}"
                    class="px-6 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    {{ __('messages.back') }}
                </a>
                <button type="submit"
                    class="px-6 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:shadow-md transition">
                    {{ __('messages.save') }}
                </button>
            </div>
        </form>
    </div>
@endsection
