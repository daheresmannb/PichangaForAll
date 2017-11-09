<?php
namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Partidos;

class AmigosConectadosEvent extends Event {
    use SerializesModels;

    public $data;

    public function __construct($dato) {
        $this->data = array(
            'id'=> $dato
        );
    }

    public function broadcastOn() {
        return ['amigos'];
    }
}