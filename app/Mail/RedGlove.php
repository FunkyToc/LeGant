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
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.RedGlove_html')->text('emails.RedGlove_text')->with([
            'hello' => $this->text->hello,
            'text' => $this->text->text,
            'end' => $this->text->end
        ]);
    }
}
