<?php

namespace App\Jobs;

use App\CBIEVStaff;
use App\CenterFaculty;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\CWRecommendation;
use App\CoWorkingSpaceApplication;
use App\Mail\CWSRecommendationMail;

use Mail;
class CWSRecommendation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $recommendation_type; 
    public $cwSpaceID; 
    public $recommended_by; 
    public $type; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($recommendation_type, $cwSpaceID)
    {
        $this->recommendation_type = $recommendation_type;
        $this->cwSpaceID = $cwSpaceID;
    }

    /**
     * Execute the job.
     * CWSRecommendation
     * @return void
     */
    public function handle()
    {
        $deanHeadComplete = false;
        if ($this->recommendation_type == 0) {//supervisor
            $members = CoWorkingSpaceApplication::find($this->cwSpaceID)-> projectMember()->get();
            
            foreach ($members as $member) {
                if ($member-> type == 2) {
                    CWRecommendation::saveNew(1, $member-> id, null, null, $this-> cwSpaceID);
                    Mail::to($member-> email)->send(new CWSRecommendationMail($member->name, $this-> url()));
                }
            }
        }
        if ($this->recommendation_type == 2) {//dean head
            $members = CoWorkingSpaceApplication::find($this->cwSpaceID)-> projectMember()->get();

            foreach ($members as $member) {
                if ($member-> type == 3) {
                    $deanhead = CenterFaculty::find($member->faculty)->deanhead()->first();
                    CWRecommendation::saveNew(2, $deanhead-> id, null, null, $this-> cwSpaceID);
                    Mail::to($member-> email)->send(new CWSRecommendationMail($deanhead-> name, $this->url()));
                }
            }
        }
            
        if ($this->recommendation_type == 3) {//manager
            $recs = CoWorkingSpaceApplication::find($this->cwSpaceID)->recommendation()->get();
            foreach ($recs as $rec) {
                if ($rec-> type == 2) {
                    if($rec-> recommendation != 1 || $rec-> recommendation != 2 )
                    {
                        return null;
                    }else
                    {
                        $manager = CBIEVStaff::where('role',2);
                        CWRecommendation::saveNew(3, $manager-> id, null, null, $this-> cwSpaceID);
                        Mail::to($manager-> email)->send(new CWSRecommendationMail($manager-> name, $this->url()));

                    }
                }
            }
        }
        if ($this->recommendation_type == 4) {//director
            $director = CBIEVStaff::where('role',3);
            CWRecommendation::saveNew(3, $director-> id, null, null, $this-> cwSpaceID);
            Mail::to($director-> email)->send(new CWSRecommendationMail($director-> name, $this->url()));
        }
        
    }

    public function url()
    {
        return route('coworkingspace.rec.form',[$this->cwSpaceID,$this->recommendation_type + 1]);
    }
}
