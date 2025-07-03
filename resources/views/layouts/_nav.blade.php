<nav class="flex bg-primary py-[10px] px-[30px] text-light justify-between sticky z-3 w-full top-0">
    <div class="flex items-center gap-[10px]">
        <div class=""><i class="fa-solid fa-book-bookmark text-[32px]"></i></div>
        <div class="flex flex-col">
            <div class="text-[20px] font-bold leading-none">Buku Tamu</div>
            <div class="text-[14px]">Admin Page</div>
        </div>
    </div>
    <button id="menu-toggle" class="md:hidden text-light text-[24px]">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div id="menu" class="hidden w-full mt-4 flex-col md:flex md:flex-row md:items-center md:w-auto md:mt-0 gap-[20px] text-secondary">
        <a href="{{ route('dashboard') }}" class="relative font-medium text-[18px] flex after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-secondary after:rounded-[2px] after:transition-all after:duration-300 items-center transition-all duration-300 {{request()->routeIs('dashboard') ? 'text-light hover:after:bg-light!' : ''}}">Home</a>
        <a href="{{ route('employee.index') }}" class=" relative font-medium text-[18px] flex after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-secondary after:rounded-[2px] after:transition-all after:duration-300 items-center transition-all duration-300 {{request()->routeIs('employee.index') ? 'text-light hover:after:bg-light!' : ''}}">Employee</a>
        <a href="{{ route('visit_history.index') }}" class=" relative font-medium text-[18px] flex after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-secondary after:rounded-[2px] after:transition-all after:duration-300 items-center transition-all duration-300 {{request()->routeIs('visit_history.index') ? 'text-light hover:after:bg-light!' : ''}}">Visitation</a>
        <a href="{{ route('report') }}" class=" relative font-medium text-[18px] flex after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-secondary after:rounded-[2px] after:transition-all after:duration-300 items-center transition-all duration-300 {{request()->routeIs('report') ? 'text-light hover:after:bg-light!' : ''}}">Report</a>
    </div>
</nav>
<div id="menu-mobile" class="hidden w-full flex-col flex md:flex-row md:items-center md:w-auto md:mt-0 gap-[20px] text-secondary bg-primary">
    <a href="{{ route('dashboard') }}" class=" relative font-medium text-[18px] hover:text-light flex items-center transition-all duration-300">Home</a>
    <a href="{{ route('employee.index') }}" class=" relative font-medium text-[18px] hover:text-light flex items-center transition-all duration-300">Employee</a>
    <a href="{{ route('visit_history.index') }}" class=" relative font-medium text-[18px] hover:text-light flex items-center transition-all duration-300">Visitation</a>
    <a href="{{ route('report') }}" class=" relative font-medium text-[18px] flex after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-secondary after:rounded-[2px] after:transition-all after:duration-300 items-center transition-all duration-300 {{request()->routeIs('report') ? 'text-light hover:after:bg-light!' : ''}}">Report</a>
</div>