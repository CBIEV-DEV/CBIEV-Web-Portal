<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    

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
    protected $fillable = ['company_reg_no', 'company_name'];

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

    // Model Relationship Function

    /**
     * 
     */
    public function mentorRegistration()
    {
        return $this-> belongsTo('App\MentorRegistration', 'company_id');
    }
    /**
     * Get the mentor registration associate with the company
     * 
     */
    public function company()
    {
        return $this->belongsTo('App\MentorRegistration', 'company_id');
    }
    // Model Function

    /**
     * 
     * Check if given company is exist in table. If not, a new entry will be created and save.
     * 
     * @param String $companyRegNo
     * @param String $companyName
     * 
     * @return Company
     */
    public static function saveCompany($companyRegNo, $companyname)
    {
        return Company::firstOrCreate(
            ['company_reg_no' => $companyRegNo],
            ['company_name' => $companyname]
        );
    }
}
