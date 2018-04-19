<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RedGlove extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The text array.
     *
     * @var text
     */
    protected $text;

    /**
     * The bgcolor string.
     *
     * @var bgcolor
     */
    protected $bgcolor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text, $bgcolor)
    {
        $this->text = $text;
        $this->bgcolor = $bgcolor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(env('MAILGUN_FROM', 'theamazingredglove@gmail.com'))
            ->view('emails.RedGlove_html')
            ->text('emails.RedGlove_text')
            ->with([
                'bgcolor' => $this->bgcolor,
                'hello' => $this->text['hello'],
                'text' => $this->text['text'],
                'bye' => $this->text['bye']
            ]
        );
    }
}
