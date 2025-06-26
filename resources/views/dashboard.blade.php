@extends('layouts.index')

@section('content')
    <div class="flex flex-col gap-[10px]">
        <div class="flex justify-around flex-wrap">
            <div class="text-[20px] text-dark bg-secondary leading-none p-[12px] rounded-[10px] font-bold">Total Visitation: {{ $visit_count }}</div>
            <div class="text-[20px] text-dark bg-secondary leading-none p-[12px] rounded-[10px] font-bold">Total Employee: {{ $employee_count }}</div>
        </div>
        <div class="flex w-full gap-[20px] items-start flex-wrap lg:flex-nowrap">
            <div class="lg:w-1/2 w-full flex flex-col justify-end">
                <div class="font-medium text-[18px]">5 Lastest Visitations:</div>
                <div class="border-3 border-secondary rounded-[10px] overflow-x-auto">
                    <table class="w-full text-dark text-[13px]">
                        <thead class="bg-secondary">
                            <tr class="*:text-start *:py-[8px] *:text-[14px] *:first:rounded-tl-[7px] *:last:rounded-tr-[7px] *:first:pl-[20px]">
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Employee</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody class="*:*:text-start *:*:py-[8px] divide-y-[2px] *:border-secondary *:hover:bg-gray-300/25 *:*:first:pl-[20px] bg-light *:last:*:first:rounded-bl-[7px] *:last:*:last:rounded-br-[7px]">
                            @foreach($visit_histories_lastest as $visitHistory)
                                <tr>
                                    <td>{{ format_date($visitHistory->date) }}</td>
                                    <td>{{ format_time($visitHistory->time) }}</td>
                                    <td>{{ $visitHistory->name }}</td>
                                    <td>{{ $visitHistory->company }}</td>
                                    <td>{{ $visitHistory->employee->name }}</td>
                                    <td>{{ $visitHistory->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-light border-3 border-secondary lg:w-1/2 w-full rounded-[10px] h-min">
                <div class="px-[12px] pt-[12px] pb-[8px] text-dark bg-secondary flex items-center">
                    <div class="leading-6 flex-2">
                        <div class="text-[18px] font-bold">Visitation Chart:</div>
                    </div>
                    <form id="chart" method="get" class="mb-[2px] flex-2 flex justify-end gap-[10px] w-full h-min items-center *:not-has-[a]:flex *:not-has-[a]:items-center *:not-has-[a]:font-bold *:not-has-[a]:bg-light *:not-has-[a]:text-dark *:not-has-[a]:rounded-[6px] *:not-has-[a]:px-[16px] *:not-has-[a]:py-[4px] *:not-has-[a]:has-[select]:pr-[0px] *:not-has-[a]:gap-[5px] *:not-has-[a]:outline-dark *:not-has-[a]:outline-2 *:not-has-[a]:transition-all *:not-has-[a]:duration-300">
                        from
                        <div class="relative group has-[input:focus-within]:bg-light has-[input:focus-within]:text-dark hover:bg-light hover:text-dark">
                            <icon class="fa-solid fa-calendar text-[16px]"></icon>
                            <input name="first_month" id="inputmonth-1"  value="{{ request('first_month') }}" class="group-hover:placeholder:text-dark group-hover:text-dark focus:outline-none focus:text-dark focus:placeholder:text-dark/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Month" size="12">
                            <div id="monthpicker-1" class="absolute h-[6px] w-full top-full left-0"></div>
                        </div>
                        to
                        <div class="relative group has-[input:focus-within]:bg-light has-[input:focus-within]:text-dark hover:bg-light hover:text-dark">
                            <icon class="fa-solid fa-calendar text-[16px]"></icon>
                            <input name="last_month" id="inputmonth-2"  value="{{ request('last_month') }}" class="group-hover:placeholder:text-dark group-hover:text-dark focus:outline-none focus:text-dark focus:placeholder:text-dark/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Month" size="12">
                            <div id="monthpicker-2" class="absolute h-[6px] w-full top-full left-0"></div>
                        </div>
                    </form>
                </div>
                <div class="w-full p-[8px]">
                    <canvas class="px-[10px]" id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module">
        $(document).ready(function () {
            flatpickr("#inputmonth-1", {
                allowInput: true,
                positionElement: document.querySelector("#monthpicker-1"),
                plugins: [
                    new monthSelectPlugin({
                        shorthand: true,
                        dateFormat: "F",
                        altFormat: "F",
                        theme: "tailwindcss-2"
                    })
                ]
            })
            flatpickr("#inputmonth-2", {
                allowInput: true,
                positionElement: document.querySelector("#monthpicker-2"),
                plugins: [
                    new monthSelectPlugin({
                        shorthand: true,
                        dateFormat: "F",
                        altFormat: "F",
                        theme: "tailwindcss-2"
                    })
                ]
            })
        })

        function checkAndSubmit() {
            const val1 = $('#inputmonth-1').val().trim();
            const val2 = $('#inputmonth-2').val().trim();

            if (val1 !== '' && val2 !== '') {
            $('#chart').submit();
            }
        }

        $('#inputmonth-1, #inputmonth-2').on('input', checkAndSubmit);
    </script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($get_data->months) !!},
                datasets: [{
                    label: 'Visitations per month',
                    data: {!! json_encode($get_data->data) !!},
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                elements: {
                    bar: {
                        backgroundColor: '#7B0005',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: '#161616'
                        },
                        grid: {
                            color: '#161616'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#161616'
                        },
                        grid: {
                            color: '#161616'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#161616'
                        }
                    }
                }
            }
        });
    </script>
@endpush
