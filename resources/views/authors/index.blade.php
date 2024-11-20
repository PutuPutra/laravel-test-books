@extends('layouts.app')
@section('title', __('messages.authors_list'))
@section('content')
    @if (session('success'))
        <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-4 shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">{{ __('messages.author') }}</h1>
        <a href="{{ route('authors.create') }}"
            class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
            {{ __('messages.add_author') }}
        </a>
    </div>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold">#</th>
                    <th class="py-3 px-4 text-left font-semibold">{{ __('messages.name') }}</th>
                    <th class="py-3 px-4 text-left font-semibold">{{ __('messages.email') }}</th>
                    <th class="py-3 px-4 text-right font-semibold">{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($authors as $author)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $author->name }}</td>
                        <td class="py-3 px-4">{{ $author->email }}</td>
                        <td class="py-3 px-4 text-right space-x-4">
                            <a href="{{ route('authors.edit', $author) }}"
                                class="text-blue-600 hover:text-blue-800 transition">
                                {{ __('messages.edit') }}</a>
                            <button onclick="handleDelete('{{ route('authors.destroy', $author) }}')"
                                class="text-red-600 hover:text-red-800 transition">
                                {{ __('messages.delete') }}</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $authors->links('vendor.pagination.tailwind') }}
    </div>
@endsection
