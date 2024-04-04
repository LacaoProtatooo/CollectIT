<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
class TransacComplete extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $orders;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $orders)
    {
        $this->user = $user;
        $this->orders = $orders;
    }
    public function build()
    {
        // Fetch orders with their associated user, courier, and collectibles
        $orders = Order::with('user', 'courier', 'collectibles')->get();

        // Initialize an empty array to store user data for each order
        $userData = [];

        // Iterate over each order to extract user data
        foreach ($orders as $order) {
            // Extract user data from the current order
            $userData[] = [
                'user' => $order->user,
                'order' => $order,
                // Add other necessary data if needed
            ];
        }

        return $this->subject('Thank You For Purchasing!!!')
                    ->view('email.success', ['userData' => $userData]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */

}
