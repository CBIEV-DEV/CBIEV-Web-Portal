<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use app\Mail\TestMail;
class EmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Notification::fake();
        $user = 'zxtan97@hotmail.com';

        // Notification::assertSentTo(
        //     $user, 
        //     TestMail::class, 
        //     function($notification, $channels) use ($user){
        //         return 
        //     }
        // );
        
        
    }
}
