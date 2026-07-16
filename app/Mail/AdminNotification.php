<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $userEmail;
    public $message;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $userEmail, $message, $type)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = match($this->type) {
            'signal' => 'Nouveau signalement - ' . $this->userName,
            'contact' => 'Nouveau message de contact - ' . $this->userName,
            default => 'Nouvelle notification - ' . $this->userName
        };

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-notification',
            with: [
                'userName' => $this->userName,
                'userEmail' => $this->userEmail,
                'message' => $this->message,
                'type' => $this->type,
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
