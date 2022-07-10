<?php
/* @var \App\Models\Task[] $tasks */
/* @var \App\Models\Task $task */
?>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tasks List') }}
    </h2>

    <!-- component -->
    <a href="{{ route('task-create') }}"
       class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-purple-700 rounded-lg focus:shadow-outline hover:bg-purple-800">Create
      task</a>

    <div class="text-gray-900 bg-gray-200">
      <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
          <tbody>
          <tr class="border-b">
            <th class="text-left p-3 px-5">№</th>
            <th class="text-left p-3 px-5">Name</th>
            <th class="text-left p-3 px-5"></th>
          </tr>
          @foreach($tasks as $task)
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
              <td class="p-3 px-5">{{$loop->index + 1}}</td>
              <td class="p-3 px-5">{{$task->name}}</td>
              <td class="p-3 px-2">
                <a href="{{ route('task', ['task' => $task]) }}"
                   class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Show
                  task</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </x-slot>
</x-app-layout>
