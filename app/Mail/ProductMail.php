<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $product_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $product_id)
    {
        $this->product_id=$product_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $subscriber = \App\Model\Subscriber::all();
        foreach ($subscriber as $send) {
            $product_name = $request->productname;
            $product_description = $request->description;
            $product_id = $this->product_id;
            $email[] = $send->email;
        }

        return $this->markdown('emails.new.product',['productname' => $product_name, 'productid' => $product_id, 'productdescription' => $product_description])->subject('New Product')->to($email);
    }
}
