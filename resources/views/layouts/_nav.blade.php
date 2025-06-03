<nav class="flex bg-primary py-[12px] px-[30px] text-light justify-between sticky z-10 w-full top-0">
    <div class="flex items-center gap-[10px]">
        <div class=""><x-fas-book-bookmark class="size-[32px]"/></div>
        <div class="flex flex-col">
            <div class="text-[20px] font-bold">Buku Tamu</div>
            <div class="text-[14px]">Admin Page</div>
        </div>
    </div>
    <div class="flex items-center gap-[20px] text-secondary">
        <a href="{{ route('dashboard') }}" class="font-medium text-[18px] hover:text-light flex hover:underline underline-offset-[8px] decoration-[2px] items-center transition-all duration-300">Home</a>
        <div class="group/employee flex flex-col relative">
            <a href="{{ route('employee.index') }}" class="font-medium text-[18px] group-hover/employee:text-light flex group-hover/employee:underline underline-offset-[8px] decoration-[2px] items-center transition-all duration-300 z-[2]">Employee<x-fas-angle-down class="size-[18px] ml-[2px]"/></a>
            <div class="invisible opacity-0 group-hover/employee:visible group-hover/employee:opacity-100 absolute w-full top-0 pt-[35px] flex flex-col text-primary text-[16px] transition-all duration-300 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-primary *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                <a href="{{ route('employee.index') }}" class=""><x-fas-list-ul class="size-[16px] mr-[5px]"/>List</a>
                <a href="{{ route('employee.create') }}" class=""><x-fas-circle-plus class="size-[16px] mr-[5px]"/>Add</a>
            </div>
        </div>
        <div class="group/visit_history flex flex-col relative">
            <a href="{{ route('visit_history.index') }}" class="font-medium text-[18px] group-hover/visit_history:text-light flex group-hover/visit_history:underline underline-offset-[8px] decoration-[2px] items-center transition-all duration-300 z-[2]">Visitation<x-fas-angle-down class="size-[18px] ml-[2px]"/></a>
            <div class="invisible opacity-0 group-hover/visit_history:visible group-hover/visit_history:opacity-100 absolute w-full top-0 pt-[35px] flex flex-col text-primary text-[16px] transition-all duration-300 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-primary *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                <a href="{{ route('visit_history.index') }}" class=""><x-fas-list-ul class="size-[16px] mr-[5px]"/>List</a>
                <a href="{{ route('visit_history.create') }}" class=""><x-fas-circle-plus class="size-[16px] mr-[5px]"/>Add</a>
            </div>
        </div>
    </div>
</nav>