@if (isset($id))
    <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="{{ route( $route , ['id' => $id]) }}"><i class="fa-solid fa-{{ $icon }} font-[16px] mr-[5px]"></i>{{ $text }}</a>
@else
    <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="{{ route( $route ) }}"><i class="fa-solid fa-{{ $icon }} font-[16px] mr-[5px]"></i>{{ $text }}</a>
@endif