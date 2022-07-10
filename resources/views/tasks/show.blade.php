<?php
/* @var \App\Models\Task $task */
/* @var \App\Models\Tag $tag */
?>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Task') }}
    </h2>

    <!-- component -->
    <a href="{{ route('tasks') }}"
       class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">Back
      </a>

    <label for="countries_disabled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
      Name</label>
    <div class="p-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300" role="alert">
      {{$task->name}}
    </div>
    <label for="countries_disabled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
      Description</label>
    <div class="p-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300" role="alert">
      <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Description"> {{$task->description}}</textarea>
    </div>
      <label for="countries_disabled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
        Tags List</label>
      <div class="p-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300" role="alert">
        <ol class="list-decimal">
          @foreach($task->tags as $tag)
            <li>{{$tag->name}}</li>
          @endforeach
        </ol>
      </div>
  </x-slot>
</x-app-layout>
