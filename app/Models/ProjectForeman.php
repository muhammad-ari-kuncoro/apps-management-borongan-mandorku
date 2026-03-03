<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectForeman extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'project_foreman';

    protected $fillable = [
        'nik',
        'name',
        'full_name',
        'no_phone',
        'address',
        'gender',
        'spesialist',
        'age',
        'join_date',
        'terminate_date',
        'daily_rate',
        'status',
    ];

    protected $casts = [
        'join_date'         => 'date',
        'terminate_date'    => 'date',
        'daily_rate'        => 'decimal:2',
        'age'               => 'integer',
    ];

    public function project()
    {
        return $this->hasMany(ProyekData::class, 'foreman_id');
    }
}
