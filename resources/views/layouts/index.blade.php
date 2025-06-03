<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark font-montserrat">
    @include('layouts._nav')
    {{-- {{ test() }} --}}
      
    <div class="bg-dark text-light mt-[25px] flex flex-col w-full px-[30px]">
        <div class="text-[32px] font-semibold">{{Breadcrumbs::current()->title}}</div>
        <div class="text-[16px] mb-[25px]">
            @if (!empty(Breadcrumbs::render()))
                {{Breadcrumbs::render()}}
            @endif
        </div>
        @yield('content')
    </div>

    @stack('scripts')
    <script type="module">
        
    </script>
</body>

</html>
