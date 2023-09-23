<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailOwner extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $header, $greetings, $firstParagraph, $secondParagraph, $thanks, $author;
    public function __construct($header, $greetings, $firstParagraph, $secondParagraph, $thanks, $author)
    {
        //
        $this->header = $header;
        $this->greetings = $greetings;
        $this->firstParagraph = $firstParagraph;
        $this->secondParagraph = $secondParagraph;
        $this->thanks = $thanks;
        $this->author = $author;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Clinica Veterinária',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.index',
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
