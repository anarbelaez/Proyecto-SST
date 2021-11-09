<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PruebaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario_nombre;
    public $usuario_password;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario_nombre,$usuario_password)
    {
        $this->usuario_nombre = $usuario_nombre;
        $this->usuario_password = $usuario_password;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.pruebamail');
    }
}
