<?php
# Implementation Scope Laravel query that we've created and reused in other modules.
# Query for status Open and Closed according to Enum inisiation.

namespace App\Models;

use App\Enums\JobStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => JobStatus::class,
    ];

    public function scopeOpen($query)
    {
        return $query->where('status', JobStatus::Open);
    }
    public function scopeClosed($query)
    {
        return $query->where('status', JobStatus::Closed);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }
}