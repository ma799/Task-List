<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task-List</title>

        @yield('style')
          @vite('resources/css/app.css')
          @vite('resources/js/app.js')

</head>
<body >
<section class="max-w-2xl mx-auto p-9">
<h1 class="text-2xl mb-4 ">@yield('title')</h1>

@if(session('success'))
<div x-data="{
    show: false,
    init() {
        // Hide element initially
        this.$el.style.display = 'none';
        // Wait for next frame to ensure clean start
        requestAnimationFrame(() => {
            this.$el.style.display = '';
            // Start animation on following frame
            requestAnimationFrame(() => {
                this.show = true;
            });
        });
    }
}" x-init="init" x-cloak>
    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="relative bg-green-100 rounded-md text-green-700 border-2 border-green-400 font-medium px-3 py-4 text-start mb-8"
    >
        <div>
            <strong class="font-bold text-xl">Success!</strong>
            <p>{{ session('success') }}</p>
            <span @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6 cursor-pointer hover:text-green-900 transition-colors duration-200"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endif

@yield('content')
</section>
</body>
</html>
