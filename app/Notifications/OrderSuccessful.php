<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderSuccessful extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $order;
    public $cartItems;
    public $totalPrice;

    public function __construct($order, $cartItems, $totalPrice)
    {
        $this->order = $order;
        $this->cartItems = $cartItems;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Order Successful')
        ->greeting('Hello!')
        ->line('Thank you for your order.')
        ->line('Here is a summary of your order:')
        ->line('Product(s):')
        ->view('emails.order_table', ['cartItems' => $this->formatCartItems($notifiable)])
        ->line('Cart Subtotal: $' . $this->totalPrice)
        ->line('Shipping: Free')
        ->line('Total: $' . $this->totalPrice)
        ->line('Thank you for shopping with us!')
        ->salutation('Regards, ' . config('app.name'));
    }

    protected function formatCartItems($notifiable)
{
    $cartItems = $this->cartItems;
    $formattedCartItems = [];

    foreach ($cartItems as $item) {
        $itemTotal = $item['price'] * $item['quantity'];

        $formattedCartItems[] = [
            'name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $item['quantity'],
            'total' => $itemTotal,
        ];

        $this->totalPrice += $itemTotal; // Calculate total
    }

    return $formattedCartItems;
}
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
