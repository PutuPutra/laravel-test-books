@extends('layouts.app')
@section('title', __('messages.edit_author'))
@section('content')
    <div class="bg-gray-100 shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-700 mb-6">{{ __('messages.edit_author') }}</h1>
        <form action="{{ route('authors.update', $author) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-lg font-semibold text-gray-700">{{ __('messages.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-300 py-3 px-4">
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email"
                        class="block text-lg font-semibold text-gray-700">{{ __('messages.email') }}</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $author->email) }}"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-300 py-3 px-4">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('authors.index') }}"
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
