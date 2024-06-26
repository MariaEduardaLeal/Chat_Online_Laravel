<?php

namespace App\Jobs;

use App\Events\RecebeMensagem;
use App\Models\Messagem;
use GuzzleHttp\Psr7\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EnviarMensagem implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Messagem $message) // O construtor recebe uma instância de Messagem como argumento
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void // Método para executar o job
    {
        // Dispara um evento RecebeMensagem, passando os dados da mensagem como parâmetro
        RecebeMensagem::dispatch([
            'id' => $this->message->id,
            'user_id' => $this->message->user_id,
            'text' => $this->message->text,
            'time' => $this->message->time,
        ]);
    }
}
