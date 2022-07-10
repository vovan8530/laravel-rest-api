<?php
/* @var \App\Models\Tag[] $tags */
/* @var \App\Models\Tag $tag */
?>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tags List') }}
    </h2>

    <!-- component -->
    <a href="{{ route('tag-create') }}"
       class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-purple-700 rounded-lg focus:shadow-outline hover:bg-purple-800">Create
      tag</a>

    <div class="text-gray-900 bg-gray-200">
      <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
          <tbody>
          <tr class="border-b">
            <th class="text-left p-3 px-5">№</th>
            <th class="text-left p-3 px-5">Name</th>
            <th class="text-left p-3 px-5"></th>
          </tr>
          @foreach($tags as $tag)
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
              <td class="p-3 px-5">{{$loop->index + 1}}</td>
              <td class="p-3 px-5">{{$tag->name}}</td>
              <td class="p-3 px-2">
                <a href="{{ route('tag', ['tag' => $tag]) }}" class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Show tag</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </x-slot>
</x-app-layout>
