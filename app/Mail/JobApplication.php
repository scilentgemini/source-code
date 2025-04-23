<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class JobApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $fullName;
    public $phone;
    public $email;
    public $userMessage;
    public $cvFile;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $file)
    {
        $this->fullName = $data['full_name'];
        $this->phone = $data['phone'];
        $this->email = $data['email'] ?? null;
        $this->userMessage = $data['message'] ?? null;
        $this->cvFile = $file;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Job Application - ' . $this->fullName
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.application'
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
            Attachment::fromPath($this->cvFile->path())
                ->as($this->cvFile->getClientOriginalName())
                ->withMime($this->cvFile->getMimeType()),
        ];
    }

    public function build()
    {
        return $this->subject('New Job Application - ' . $this->fullName)
                    ->view('emails.application')
                    ->attach($this->cvFile->getRealPath(), [
                        'as' => $this->cvFile->getClientOriginalName()
                    ]);
    }
}
