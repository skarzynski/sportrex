<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'details', 'complaint_date', 'complaintStatus_id',
    ];

    function complaintStatus() {
        return $this->belongsTo(ComplaintStatus::class);
    }

    function order() {
        return $this->belongsTo(Order::class);
    }
}
