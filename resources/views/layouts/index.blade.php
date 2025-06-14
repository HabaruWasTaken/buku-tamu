<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/2cd666ef2f.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark font-montserrat">

    @include('layouts._nav')
      
    <div class="bg-dark text-light mt-[20px] flex flex-col w-full px-[30px] pb-[20px]">
        @php
            $current = Route::current()->action['as'];
        @endphp
        
        @if (isset($employee) && !isset($employees))
            <div class="text-[28px] font-semibold">{{explode(":", Breadcrumbs::generate($current, $employee)->last()->title)[0]}}</div>
            <div class="text-[16px] mb-[20px]">
                {{Breadcrumbs::render($current, $employee)}}
            </div>
        @else
            <div class="text-[28px] font-semibold">{{Breadcrumbs::generate($current)->last()->title}}</div>
            <div class="text-[16px] mb-[20px]">
                {{Breadcrumbs::render($current)}}
            </div>
        @endif
        
        @yield('content')
        
    </div>

    @stack('scripts')
    <script type="module">
        $(document).ready(function() {
            $('.select-division-secondary').select2({
                placeholder: "Select Division",
                theme: 'tailwindcss-3',
                width: '100%',
                allowClear: true,
                scrollAfterSelect: true,
                dropdownPosition: 'below'
            })
            $('.select-division-light').select2({
                placeholder: "Select Division",
                theme: 'tailwindcss-2',
                width: '100%',
                allowClear: true,
                scrollAfterSelect: true,
                dropdownPosition: 'below'
            })
            $('.select-position-secondary').select2({
                placeholder: "Select Position",
                theme: 'tailwindcss-3',
                width: '100%',
                allowClear: true,
                scrollAfterSelect: true,
                dropdownPosition: 'below'
            })
            $('.select-position-light').select2({
                placeholder: "Select Position",
                theme: 'tailwindcss-2',
                width: '100%',
                allowClear: true,
                scrollAfterSelect: true,
                dropdownPosition: 'below'
            })
            $('.select-employee-light').select2({
                placeholder: "Select Employee",
                theme: 'tailwindcss-2',
                allowClear: true,
                scrollAfterSelect: true,
                width: '100%',
                dropdownPosition: 'below'
            });
        });
    </script> 
</body>

</html>
