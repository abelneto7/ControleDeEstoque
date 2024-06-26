<?php

namespace App\Http\Middleware;
use App\LogAcesso;

use Closure;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*o middleware LogAcessoMiddleware serve para registrar em um banco de dados
    (na tabela log_acessos) informações sobre cada requisição que chega à sua aplicação,
    especificamente o IP do cliente que fez a requisição e a rota que foi acessada.*/

    public function handle($request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);

        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O status da resposta e o texto foram modificados!!!');
        return $resposta;
    }
}
