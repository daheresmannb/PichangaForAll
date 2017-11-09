<?php
namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class AmigosConectadosEvent extends Event {
    use SerializesModels;

    public $data;

    public function __construct(User $user) {
        $this->data = $user;
    }

    public function broadcastOn() {
        return ['amigos'];
    }
}