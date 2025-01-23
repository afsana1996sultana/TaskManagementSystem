<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'created_by',
    ];

    public function CreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
