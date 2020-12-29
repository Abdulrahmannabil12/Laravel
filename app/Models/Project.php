<?php

namespace App\Models;

use App\Observers\ProjectObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table ='projects';

    protected $fillable=['title','status','tasks'];

    protected $hidden=['user_id'];


    protected static function boot()
    {
        parent::boot();
        self::observe(ProjectObserver::class);
    }
    public function users(){

        return $this->belongsTo(User::class ,'user_id');
    }
    public function tasks(){

        return $this->hasMany(ProjectTasks::class ,'project_id');
    }
    public function getActive()
    {
        return $this->active == 1 ? 'Active' : 'Inactive';

    }
    public function scopeSelection($query)
    {

        return $query->select('id', 'title', 'status');
    }
}
