<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectManPower extends Model
{
    use HasFactory;

    protected $table = 'project_manpower';

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

    public function teams()
    {
        return $this->hasMany(ProjectTeam::class, 'manpower_id');
    }
}
