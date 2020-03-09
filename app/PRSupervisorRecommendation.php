<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PRSupervisorRecommendation extends Model
{
    /**
     * Table name for this model
     */
    protected $table = 'pr_supervisor_recommendations';

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
     * Get Supervisor associate to current recommendation
     */
    public function prSupervisor()
    {
        return $this->belongsTo('App\ProjectSupervisor', 'recommended_by');
    }

    /**
     * 
     */
    public function prStatus()
    {
        return $this->belongsTo('App\ProjectRegistrationStatusTracking', 'pr_status_tracking_id');
    }
    // Model Function start
    /**
     * 
     */
    public static function saveNewSupervisorRecommendation(
        $recommended_by, $pr_status_tracking_id)
    {
        return PRSupervisorRecommendation::create([
            'recommended_by' => $recommended_by,
            'recommended_by' => $pr_status_tracking_id,
        ]);
    }
}
