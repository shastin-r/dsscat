<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ValidarUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;

    public function __construct($cliente)
    {
        $this->cliente = $cliente;
    }

    public function build()
    {
        return $this->view('emails.validar_usuario')
                    ->with(['cliente' => $this->cliente]);
    }
}
