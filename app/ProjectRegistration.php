<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectRegistration extends Model
{
    /* The table associated with the model.
    *
    * @var string
    */
    protected $table = 'project_registrations';

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

    // Getter/Setter Start
    /**
     * Set the Project Title to UpperCase.
     *
     * @param  string  $value
     * @return void
     */
    public function setProjectTitleAttribute($value)
    {
        $this->attributes['project_title'] = strtoupper($value);
    }
    /**
     * Get the registration id and modify into tracking code.
     *
     * @param  int  $id
     * @return string
     */
    public function getIdAttribute_($id)
    {
        return 'P' . sprintf('%04d', $id);
    }
    // Getter/Setter End
    
    // Eloquent Relationship Function Start
    /**
     * Get the status tracking for current project 
     * 
     */
    public function statusTracking(){

        return $this->hasMany('App\ProjectRegistrationStatusTracking', 'project_registration_id', 'id');

    } 

    /**
     * Get the particpants in this project registration
     * 
     */
    public function projectMember(){

        return $this->belongsToMany('App\ProjectMember', 'pr_member_list', 'project_registration_id', 'project_member_id')->withTimestamps();

    } 

    /**
     * Get the supervisor in this project registration 
     * 
     */
    public function projectSupervisor(){

        return $this->belongsToMany('App\ProjectSupervisor', 'pr_supervisor_list', 'project_registration_id', 'project_supervisor_id')->withTimestamps();

    } 

    /**
     * Get the project category
     * 
     */
    public function category()
    {
        return $this-> belongsTo('App\ProjectCategory', 'category_id');
    }

    /**
     * Get the project leader
     * 
     */
    public function leader()
    {
        return $this-> belongsTo('App\ProjectMember', 'team_leader');
    }

    /**
     * Get the temp account associate with project registration
     */
    public function tempAcc()
    {
        return $this->hasOne('App\PRTempAccount', 'project_registration_id');
    }
 
    public function fileUpload()
    {
        return $this->hasMany('App\ProjectUploadLog','project_id', 'id');
    }

    // Eloquent Relationship Function End

    // Model Function Start
    /**
     * 
     * Create new instance of participant
     */
    public static function projectRegistration(){

        return new ProjectRegistration();
    }

    /**
     * Get Table Column
     */
    public function getTableColumns() {
        return $this
            ->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->getTable());
    }

    /**
     * Get the lastest status tracking of status 7 for current project 
     * 
     */
    public function statusTrackingLatest(){

        return $this->hasMany('App\ProjectRegistrationStatusTracking', 'project_registration_id', 'id')-> orderBy('created_at', 'desc')-> first();

    } 

    /**
     * Save project registration
     * @param 
     * @return ProjectRegistration1
     */
    public static function saveRegistration(
        $project_title, $problem_statement, $product_solution, $target_market, $category_id, $team_leader)
    {
        return ProjectRegistration::create([
            'project_title' -> $project_title,
            'problem_statement' -> $problem_statement,
            'product_solution' -> $product_solution,
            'target_market' -> $target_market,
            'category_id' -> $category_id,
            'team_leader' -> $team_leader,
        ]);
    }
    // Model Function End
}
