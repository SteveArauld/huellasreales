<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $userEmail;
    public $breed;
    public $phone;
    public $city;
    public $userMessage;  // ⚠️ CHANGÉ : 'message' -> 'userMessage'

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $userEmail, $userMessage, $breed = null, $phone = null, $city = null)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userMessage = $userMessage;  // ⚠️ CHANGÉ
        $this->breed = $breed;
        $this->phone = $phone;
        $this->city = $city;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau message du formulaire de contact',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-contact',
            with: [
                'userName' => $this->userName,
                'userEmail' => $this->userEmail,
                'userMessage' => $this->userMessage,  // ⚠️ CHANGÉ
                'breed' => $this->breed,
                'phone' => $this->phone,
                'city' => $this->city,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}