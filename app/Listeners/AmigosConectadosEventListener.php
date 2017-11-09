<?php

namespace App\Listeners;

use App\Events\AmigosConectadosEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LRedis;
use Response;

class AmigosConectadosEventListener {
    CONST EVENT   = 'amigos';
    CONST CHANNEL = 'amigos';
    
    public function __construct() {
    }

    /**
     * Handle the event.
     *
     * @param  AmigosConectadosEvent  $event
     * @return void
     */
    public function handle(AmigosConectadosEvent $event) {
        $redis = LRedis::connection();
        $redis->publish(self::CHANNEL, json_encode($event));
    }
}
