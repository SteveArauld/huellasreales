<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $fullName;
    public $userEmail;
    public $breed;
    public $puppyName;
    public $whatsapp;
    public $city;
    public $userMessage; // Renommé pour éviter le conflit

    public function __construct($fullName, $userEmail, $breed, $puppyName, $whatsapp, $city, $userMessage = null)
    {
        $this->fullName = $fullName;
        $this->userEmail = $userEmail;
        $this->breed = $breed;
        $this->puppyName = $puppyName;
        $this->whatsapp = $whatsapp;
        $this->city = $city;
        $this->userMessage = $userMessage; // Changé ici
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle commande de chiot',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-order',
            with: [
                'fullName' => $this->fullName,
                'userEmail' => $this->userEmail,
                'breed' => $this->breed,
                'puppyName' => $this->puppyName,
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