<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectRegistrationStatusTracking extends Model
{
    /**
     * Table name for this model
     */
    protected $table = 'pr_status_trackings';

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
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

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
    protected $casts = [];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [];

    // Model Relation Function
    /**
     * 
     */
    public function supervisorRecommendation()
    {
        return $this->hasMany('App\PRSupervisorRecommendation','pr_status_tracking_id');
    }
    /**
     * 
     */
    public function deanHeadRecommendation()
    {
        return $this->hasMany('App\PRDeanHeadRecommendation','pr_status_tracking_id');
    }
    /**
     * 
     */
    public function managerRecommendation()
    {
        return $this->hasMany('App\PRManagerRecommendation','pr_status_tracking_id');
    }
    /**
     * 
     */
    public function directorApproval()
    {
        return $this->hasMany('App\PRDirectorApproval','pr_status_tracking_id');
    }
    /**
     * 
     */
    public function projectRegistration()
    {
        return $this->belongsTo('App\ProjectRegistration', 'project_registration_id');
    }

    // Start model function

    /**
     * To save new project status tracking
     */
    public function saveStatusTracking($project_registration_status, $project_registration_id){
        ProjectRegistrationStatusTracking::create([
            'project_registration_status' => $project_registration_status,
            'project_registration_id' => $project_registration_id
        ]);
    }

    /**
     * To save project tracking with status 'submited'
     * 
     */
    public static function saveSubmitedStatus($project_registration_id)
    {
        self::saveStatusTracking(0, $project_registration_id);
    }
    /**
     * To save project tracking with status 'supervisor recommendation'
     * 
     */
    public static function saveSupervisorRecStatus($project_registration_id)
    {
        self::saveStatusTracking(1, $project_registration_id);
    }
    /**
     * To save project tracking with status 'dean/head recommendation'
     * 
     */
    public static function saveDeanHeadRecStatus($project_registration_id)
    {
        self::saveStatusTracking(2, $project_registration_id);
    }
    /**
     * To save project tracking with status 'manager recommendation'
     * 
     */
    public static function saveManagerRecStatus($project_registration_id)
    {
        self::saveStatusTracking(3, $project_registration_id);
    }
    /**
     * To save project tracking with status 'director approval'
     * 
     */
    public static function saveDirectorApprovalStatus($project_registration_id)
    {
        self::saveStatusTracking(4, $project_registration_id);
    }
    /**
     * To save project tracking with status 'approved'
     * 
     */
    public static function saveApprovedStatus($project_registration_id)
    {
        self::saveStatusTracking(5, $project_registration_id);
    }
    /**
     * To save project tracking with status 'rejected'
     * 
     */
    public static function saveRejectedStatus($project_registration_id)
    {
        self::saveStatusTracking(6, $project_registration_id);
    }
}
 