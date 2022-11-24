<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'id',
        'employee_id',
        'leave_id',
        'leave_from',
        'leave_to',
        'leave_description',
        'leave_status',
        'oa_remark'
    ];
}
