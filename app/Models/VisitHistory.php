<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitHistory extends Model
{
    protected $table = 'visit_histories';

    protected $fillable = [
        'name',
        'date',
        'time',
        'time_out',
        'company',
        'phone',
        'employee_id',
        'description'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
