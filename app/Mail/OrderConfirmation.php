<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $pdf;

    public function __construct($order, $pdf)
    {
        $this->order = $order;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Order Confirmation - ' . $this->order->order_number)
                    ->view('emails.order_confirmation')
                    ->attachData($this->pdf->output(), 'order_invoice.pdf', ['mime' => 'application/pdf']);
    }
}
