<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTasks extends Model
{
    use HasFactory;
    protected $table = 'project_tasks';

    protected $fillable=['title','status','content'];

    protected $hidden=['project_id'];

    public function projects(){

        return $this->belongsTo(Project::class ,'project_id');
    }
    public function scopeSelection($query)
    {

        return $query->select('id', 'title', 'status', 'content','project_id');
    }
}
