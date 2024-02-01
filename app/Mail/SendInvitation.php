<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;

class SendInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $position, $company;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $position, $company)
    {
        $this->name = $name;
        $this->email = $email;
        $this->position = $position;
        $this->company = $company;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('invitation@pln-investmentdays.com', 'PLN Investment Days 2024'),
            subject: 'PLN Investment Days Invitation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.sendInvitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path() . '/' . 'Invitation.pdf')
                ->as('Invitation Letter PLN Investment Day 2024.pdf')
                ->withMime('application/pdf')
        ];
    }
}
