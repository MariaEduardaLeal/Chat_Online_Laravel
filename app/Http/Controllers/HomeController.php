<?php

namespace App\Http\Controllers;

use App\Jobs\EnviarMensagem;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Messagem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', auth()->id())->select([
            'id', 'name', 'email',
        ])->first();

        return view('home', [
            'user'=>$user,
        ]);
    }

    public function messages(): JsonResponse
    {
        $messages = Messagem::with('user')->get()->append('time');

        return response()->json($messages);
    }
    public function message(Request $request): JsonResponse
    {
        // Cria uma nova mensagem com base nos dados recebidos na requisição
        $message = Messagem::create([
            'user_id' => auth()->id(),
            'text' => $request->get('text'),
        ]);
        // Dispara um job EnviarMensagem para processar a mensagem em segundo plano
        EnviarMensagem::dispatch($message);

        // Retorna uma resposta JSON indicando que a mensagem foi criada e o job foi despachado
        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }
}
