<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Setting;

class TrainingForm extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $settings = Setting::first();
        return $this->from("info@titanicsecurity.com")
                    ->replyTo($this->data['email'])
                    ->subject('Training Form Request')
                    ->markdown('frontend.emails.training',[
                        'data' => $this->data
                    ]);
    }
}
