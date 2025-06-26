<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <script src="https://kit.fontawesome.com/2cd666ef2f.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/io.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark font-montserrat">

    @include('layouts._nav')
      
    <div class="bg-dark text-light mt-[20px] flex flex-col w-full px-[30px] pb-[20px]">
        @php
            $current = Route::current()->action['as'];
        @endphp
        
        <div class="w-full relative">
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
            @yield('notif')
        </div>
        
        @yield('content')
        
    </div>

    <script>
        $(document).ready(function() {
            $('#menu-toggle').on('click', function(){
                $('#menu-mobile').toggleClass('hidden');
            })
            
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
    @stack('scripts')
</body>

</html>
