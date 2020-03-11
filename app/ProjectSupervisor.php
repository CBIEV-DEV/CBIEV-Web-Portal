<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSupervisor extends Model
{
    /**
     * Table name for this model
     */
    protected $table = 'project_supervisors';
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
        'member_type', 
        'name', 
        'ic',
        'contact',
        'email',
        'position', 
        'company_id', 
        'company_email', 
        'position', 
        'uc_id', 
        'center_faculty_id',  
        'is_active'
    ];
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [];

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
     * Get center/faculty associate with member
     */
    public function centerFaculty()
    {
        return $this->belongsTo('App\CenterFaculty', 'center_faculty_id');
    }
    /**
     * Get company associate with member
     */
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function prRecommendation()
    {
        return $this->hasMany('App\PRSupervisorRecommendation', 'recommended_by', 'id');
    }

    /**
     * Save project supervisor
     */
    public static function saveProjectSupervisor(
        $ic, $member_type, $name, $contact, $email, $company_id, $company_email, $position, $uc_id, $center_faculty_id)
    {
        return ProjectSupervisor::firstOrCreate(
            ['ic' => $ic],
            [

                'member_type' => $member_type,
                'name' => $name,
                'contact' => $contact,
                'email' => $email,
                'company_id' => $company_id,
                'company_email' => $company_email,
                'position' => $position,
                'uc_id' => $uc_id,
                'center_faculty_id' => $center_faculty_id,
            ]
        );
    }
    

}
