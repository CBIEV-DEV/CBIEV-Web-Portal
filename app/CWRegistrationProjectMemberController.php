<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CWRegistrationProjectMemberController extends Model
{
    /* The table associated with the model.
    *
    * @var string
    */
    protected $table = 'c_w_registration_project_member';

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
    //

    public static function saveMember(
      $name,
      $ic,
      $contact,
      $email,
      $uc_id,
      $faculty,
      $programme_study,
      $type
    )
    {

      return CWRegistrationProjectMemberController::firstOrCreate(
        ['ic' => $ic],
        [
            'type' => $type,
            'name' => $name,
            'contact' => $contact,
            'email' => $email,
            'uc_id' => $uc_id,
            'faculty' => $faculty,
            'programme_study' => $programme_study
        ]
    );
    }

    public function projectApplication(){
      
      return $this->belongsToMany('App\CoWorkingSpaceApplication', 'co_working_project_member', 'cw_application_id', 'project_member_id')->withTimestamps();
  } 
}
