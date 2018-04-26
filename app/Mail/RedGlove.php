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
    public function __construct(array $text, string $bgcolor)
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
            ->from(env('MAIL_FROM', 'theamazingredglove@gmail.com'))
            ->text('emails.RedGlove_text')
            ->view('emails.RedGlove_html')
            ->with([
                'bgcolor' => $this->bgcolor,
                'hello' => $this->text['hello'],
                'text' => $this->text['text'],
                'bye' => $this->text['bye'],
                'sign' => $this->text['sign']
            ]
        );
    }
}
