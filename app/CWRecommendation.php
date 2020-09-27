<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CWRecommendation extends Model
{
        /* The table associated with the model.
    *
    * @var string
    */
    protected $table = 'c_w_recommendations';

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
    public function cwApplication()
    {
        return $this->belongsTo('App\CoWorkingSpaceApplication', 'cw_space_id');
    }

    public static function saveNew($type, $recommended_by, $recommendation, $comments, $cw_space_id)
    {
        return CWRecommendation::create([
            'type' => $type,
            'recommended_by' => $recommended_by,
            'recommendation' => $recommendation,
            'comments' => $comments,
            'cw_space_id' => $cw_space_id,
        ]);
    }
}
