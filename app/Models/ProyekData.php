<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyekData extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_proyeks';

    protected $fillable = [
        'code_project',
        'foreman_id',
        'name_project',
        'type_project',
        'name_client',
        'pic_client',
        'location_project',
        'start_date_project',
        'end_date_plan_project',
        'end_date_actual',
        'progress',
        'status',
        'contract_value',
        'notes',
    ];

    protected $casts = [
        'start_date_project'                 => 'date',
        'end_date_plan_project'              => 'date',
        'end_date_actual'                    => 'date',
        'progress'                           => 'integer',
        'contract_value'                     => 'integer',
    ];

    public function foreman()
    {
        return $this->belongsTo(ProjectForeman::class, 'foreman_id');
    }
    public function milestones()
    {
        return $this->belongsTo(ProjectMilestone::class, 'project_id');
    }
    public function teams()
    {
        return $this->hasMany(ProjectTeam::class, 'project_id');
    }
}
