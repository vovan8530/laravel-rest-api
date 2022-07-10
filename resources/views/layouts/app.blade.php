<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
  @include('layouts.navigation')

  <!-- Page Heading -->
  <header class="bg-white shadow">
    @if (\Session::has('class') == 'success')
      <div class="p-10 flex flex-col gap-5 items-center">
        <div class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-5/12">
          <div class="flex w-3 bg-gradient-to-t from-green-500 to-green-400"></div>
          <div class="flex-1 p-3">
            <h1 class="md:text-xl text-gray-600">Success</h1>
            <p class="text-gray-400 text-xs md:text-sm font-light">{{ session('message') }}</p>
          </div>
        </div>
      </div>
    @elseif(\Session::has('error'))
      <div class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-5/12">
        <div class="flex w-3 bg-gradient-to-t from-red-500 to-red-400"></div>
        <div class="flex-1 p-3">
          <h1 class="md:text-xl text-gray-600">Error</h1>
          <p class="text-gray-400 text-xs md:text-sm font-light">{{session('error')}}</p>
        </div>
      </div>
    @endif
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      {{ $header }}
    </div>
  </header>

  <!-- Page Content -->
  <main>
    {{ $slot }}
  </main>
</div>
</body>
</html>

