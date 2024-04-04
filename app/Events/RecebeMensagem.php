<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RecebeMensagem implements ShouldBroadcast // Esta classe implementa a interface ShouldBroadcast, indicando que é um evento de broadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels; // Usa traits relacionadas à serialização e interação com sockets

    /**
     * Create a new event instance.
     */
    public function __construct(public array $messagens)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array // Método para definir os canais nos quais o evento deve ser transmitido
    {
        return [
            new PrivateChannel('channel-for_everyone'), // Retorna um PrivateChannel chamado 'channel-for_everyone'
        ];
    }
}
