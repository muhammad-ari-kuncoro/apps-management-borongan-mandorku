<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;
    protected $table = 'project_per_teams';

    protected $fillable = [
        'project_id',
        'foreman_id',
        'manpower_id',
        'category_teams',
        'terminate_date',
    ];

    public function project()
    {
        return $this->belongsTo(ProyekData::class, 'project_id');
    }

    public function foreman()
    {
        return $this->belongsTo(ProjectForeman::class, 'foreman_id');
    }
}
