<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;


class NewMail extends Mailable
{
    use Queueable, SerializesModels;
    

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
        // mengirimkan email dengan mengetahui from, to, lalu subject Email dan isi email tersebut.
        return $this
        ->from('no-reply@intern.test', 'Test intern')
        ->to('eddy@mobilepulsa.com')
        ->subject('Pembayaran tiket BTX berhasil')
        ->view('emails.email');
    }
}
