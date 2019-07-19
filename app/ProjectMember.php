<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    /**
     * Table name for this model
     */
    protected $table = 'project_members';
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
        'member_type', 'name', 'ic', 'contact', 'email', 'company_id', 'company_email', 'position', 'uc_id', 'center_faculty_id', 'programme_study', 'is_active'
    ];

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
    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * Get programme associate with member
     */
    public function programme()
    {
        return $this->belongsTo('App\Programme', 'programme_study');
    }
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
    /**
     * To set member type 
     * @param Integer $faculty_center_id
     * 
     * @return Integer 
     */
    public static function setMemberType($faculty_center_id){
        if (!($faculty_center_id === 10)) {
            return 1;
        }else {
            return 2;
        }
    }
}
