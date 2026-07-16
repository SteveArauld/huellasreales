<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $language;
    public $confirmationLink;
    public $puppyName;
    public $breed;
    public $email;
    public $whatsapp;
    public $city;
    public $userMessage; // Renommé pour éviter le conflit

    public function __construct($name, $language, $confirmationLink, $puppyName = null, $breed = null, $email = null, $whatsapp = null, $city = null, $userMessage = null)
    {
        $this->name = $name;
        $this->language = $language;
        $this->confirmationLink = $confirmationLink;
        $this->puppyName = $puppyName;
        $this->breed = $breed;
        $this->email = $email;
        $this->whatsapp = $whatsapp;
        $this->city = $city;
        $this->userMessage = $userMessage; // Changé ici
    }

    public function envelope(): Envelope
    {
        $subject = match($this->language) {
            'fr' => 'Confirmation de votre commande',
            'es' => 'Confirmación de su pedido',
            'de' => 'Bestätigung Ihrer Bestellung',
            default => 'Order confirmation'
        };

        return new Envelope(
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.confirmation',
            with: [
                'logoUrl' => asset('assets/logo/logo.png'),
                'name' => $this->name,
                'language' => $this->language,
                'confirmationLink' => $this->confirmationLink,
                'puppyName' => $this->puppyName,
                'breed' => $this->breed,
                'email' => $this->email,
                'whatsapp' => $this->whatsapp,
                'city' => $this->city,
                'userMessage' => $this->userMessage, // Changé ici
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}