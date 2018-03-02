<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $input;

    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->view('mails.review')
                    ->subject('Новый отзыв на сайте ' .env('APP_NAME', route('home')))
                    ->with([
                                'data' => $this->input,

                            ]);
    }
}
