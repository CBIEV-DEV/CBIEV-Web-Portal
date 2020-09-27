<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoWorkingSpaceApplication extends Model
{
    /* The table associated with the model.
    *
    * @var string
    */
    protected $table = 'co_working_space_applications';

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

    public static function saveApplication(
      $project_type,
      $project_title,
      $project_description,
      $start_duration,
      $end_duration
    )
    {
      return CoWorkingSpaceApplication::create([
            'project_type' => $project_type,
            'project_title' => $project_title,
            'project_description' => $project_description,
            'start_duration' => $start_duration,
            'end_duration' => $end_duration,
      ]);
    }

    public function projectMember(){
      
      return $this->belongsToMany('App\CWRegistrationProjectMemberController', 'co_working_project_member', 'cw_application_id', 'project_member_id')->withTimestamps();
    } 
    public function recommendation(){
      
      return $this->hasMany('App\CWRecommendation', 'cw_space_id');
    } 
}
