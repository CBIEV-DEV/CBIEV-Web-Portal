<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

use App\PRSupervisorRecommendation;
use App\PRDeanHeadRecommendation;
use App\PRManagerRecommendation;
use App\Http\Controllers\ProjectRegistrationStatusTrackingController;
use App\Mail\ProjectRegistrationNotRecommendedNotification;
use App\Http\Controllers\PRSupervisorRecommendationController;
use App\Http\Controllers\PRDeanHeadRecommendationController;
use App\Http\Controllers\PRManagerRecommendationController;

class PRNotRecommended implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $type;
    protected $recID;
    protected $projectRegis;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $recID)
    {
        $this-> type = $type;
        $this-> recID = $recID;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this-> type) {
            case 1:
                $rec = PRSupervisorRecommendation::find($this-> recID);
                break;
            case 2:
                $rec = PRDeanHeadRecommendation::find($this-> recID);
                break;
            case 3:
                $rec = PRManagerRecommendation::find($this-> recID);
                break;
        }
        $this-> projectRegis = $rec-> prStatus-> projectRegistration;
        
        $prstc = new ProjectRegistrationStatusTrackingController();
        switch ($this-> type) {
            case 1:
                $prstc->startSupervisorRecommendation($this-> projectRegis);
                break;
            case 2:
                $prstc->startDeanHeadRecommendation($this-> projectRegisy);
                break;
            case 3:
                $prstc->startManagerRecommendation($this-> projectRegis);
                break;
        }

        PRCreateNewTempAccount::dispatch($this-> projectRegis)->delay(now()->addSeconds(5));
        


    }
}
