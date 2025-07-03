<?php

namespace App\Exports;

use App\Models\VisitHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitHistoriesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        return VisitHistory::with('employee')->get()->map(function ($visit) {
            return [
                format_date($visit->date),
                format_time($visit->time),
                format_time($visit->time_out) ?? '-',
                $visit->name,
                $visit->company,
                $visit->phone,
                $visit->employee->name,
                $visit->description,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Date',
            'Time In',
            'Time Out',
            'Name',
            'Company',
            'Phone',
            'Employee',
            'Description',
        ];
    }
}
