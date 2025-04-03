<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $prenom;
    public $email;

    public function __construct($nom, $prenom, $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('Confirmation d\'inscription')
                    ->view('emails.confirmation') // Vue de l'email
                    ->with([
                        'nom' => $this->nom,
                        'prenom' => $this->prenom,
                    ]);
    }
}
