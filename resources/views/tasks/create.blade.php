<?php
/* @var \App\Models\Tag[] $tags */
/* @var \App\Models\Tag $tag */
?>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Task') }}
    </h2>

    <!-- component -->
    <div class="flex-row">
      <form class="" action="{{route('task-store')}}" method="POST">
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-2/3">
            <input
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              id="inline-full-name"
              placeholder="Name"
              name="name"
              type="text">
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-2/3">
            <textarea id="message" rows="4"
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      name="description"
                      placeholder="Description"></textarea>
          </div>
        </div>
        @isset($tags)
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-2/3">
            <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
              an option</label>
            <select multiple id="countries_multiple" name="tagIds[]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option disabled>Choose tags</option>
              @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>
          </div>
          @endisset
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-2/3">
            <button
              class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
              type="submit">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </x-slot>
</x-app-layout>
