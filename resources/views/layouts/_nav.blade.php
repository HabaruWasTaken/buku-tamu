<nav class="flex bg-primary py-[10px] px-[30px] text-light justify-between sticky z-3 w-full top-0">
    <div class="flex items-center gap-[10px]">
        <div class=""><i class="fa-solid fa-book-bookmark text-[32px]"></i></div>
        <div class="flex flex-col">
            <div class="text-[20px] font-bold leading-none">Buku Tamu</div>
            <div class="text-[14px]">Admin Page</div>
        </div>
    </div>
    <div class="flex items-center gap-[20px] text-secondary">
        <a href="{{ route('dashboard') }}" class=" relative font-medium text-[18px] hover:text-light flex after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-light after:rounded-[2px] after:transition-all after:duration-300 items-center transition-all duration-300">Home</a>
        <div class="group flex flex-col relative after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-light after:rounded-[2px] after:transition-all after:duration-300">
            <a href="{{ route('employee.index') }}" class="font-medium text-[18px] group-hover:text-light flex decoration-[2px] items-center transition-all duration-300 z-[2]">Employee<icon class="fa-solid fa-angle-down size-[18px] ml-[3px]"></icon></a>
            <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 absolute w-full top-0 pt-[35px] flex flex-col text-primary text-[16px] transition-all duration-300 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-primary *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                <a href="{{ route('employee.index') }}" class=""><i class="fa-solid fa-list-ul text-[16px] mr-[5px]"></i>List</a>
                <a href="{{ route('employee.create') }}" class=""><i class="fa-solid fa-plus-circle text-[16px] mr-[5px]"></i>Add</a>
            </div>
        </div>
        <div class="group flex flex-col relative after:absolute after:-bottom-[2px] after:w-full after:h-[2px] after:bg-transparent hover:after:bg-light after:rounded-[2px] after:transition-all after:duration-300">
            <a href="{{ route('visit_history.index') }}" class="font-medium text-[18px] group-hover:text-light flex decoration-[2px] items-center transition-all duration-300 z-[2]">Visitation<icon class="fa-solid fa-angle-down size-[18px] ml-[3px]"></icon></a>
            <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 absolute w-full top-0 pt-[35px] flex flex-col text-primary text-[16px] transition-all duration-300 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-primary *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                <a href="{{ route('visit_history.index') }}" class=""><i class="fa-solid fa-list-ul text-[16px] mr-[5px]"></i>List</a>
                <a href="{{ route('visit_history.create') }}" class=""><i class="fa-solid fa-plus-circle text-[16px] mr-[5px]"></i>Add</a>
            </div>
        </div>
    </div>
</nav>