<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMilestone extends Model
{
    use HasFactory;

    protected $table = 'project_milestones';

        protected $fillable = [
            'project_id',
            'name_project_mls',
            'date_target',
            'finish_date_target',
            'progress',
            'status',
            'note',
    ];

    protected $casts = [
        'date_target'           => 'date',
        'finish_date_target'    => 'date',
        'progress'              => 'integer',
    ];

    public function project()
    {
        return $this->belongsTo(ProyekData::class, 'project_id');
    }
}
