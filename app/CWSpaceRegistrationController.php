<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CWSpaceRegistrationController extends Model
{
    /* The table associated with the model.
    *
    * @var string
    */
    protected $table = 'c_w_space_registrations';

   /**
    * The primary key associated with the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    public function projectMember(){

        return $this->belongsToMany('App\ProjectMember', 'c_w_registration_project_member', 'c_w_resgistration_id', 'project_member_id')->withTimestamps();

    } 

    /**
     * Get the supervisor in this project registration 
     * 
     */
    public function projectSupervisor(){

        return $this->belongsToMany('App\ProjectSupervisor', 'c_w_registration_project_supervisor', 'c_w_resgistration_id', 'project_supervisor_id')->withTimestamps();

    } 
    //
}
