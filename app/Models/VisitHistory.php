<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitHistory extends Model
{
    protected $table = 'visit_histories';

    protected $fillable = [
        'employee_id',
        'date',
        'time',
        'time_out',
        'name',
        'time',
        'time_out',
        'company',
        'phone',
        'description'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
