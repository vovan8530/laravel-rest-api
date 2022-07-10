<?php
/* @var \App\Models\Tag $tag */
/* @var \App\Models\Task $task */
?>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tag') }}
    </h2>

    <!-- component -->
    <a href="{{ route('tags') }}"
       class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">Back
    </a>

    <label for="countries_disabled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
      Name</label>
    <div class="p-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300" role="alert">
      {{$tag->name}}
    </div>

    <label for="countries_disabled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
      Tasks List</label>
    <div class="p-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300" role="alert">
      <ol class="list-decimal">
        @foreach($tag->tasks as $task)
          <li>{{$task->name}}</li>
        @endforeach
      </ol>
    </div>
  </x-slot>
</x-app-layout>
