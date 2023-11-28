<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends CashierController
{
    public function handleWebhook(array $payload)
    {
         // Log the raw incoming webhook payload
         Log::channel('stripe')->info('Stripe Webhook Received', ['payload' => $request->getContent()]);

         try {
             // Handle the incoming webhook event
             $payload = $request->all();
             $this->handleStripeWebhook($payload);
 
             // Log the success of handling the webhook
             Log::channel('stripe')->info('Stripe Webhook Handled Successfully');
         } catch (\Exception $e) {
             // Log any exceptions that occur during webhook handling
             Log::channel('stripe')->error('Error handling Stripe Webhook', ['error' => $e->getMessage()]);
         }
 
         return response()->json(['success' => true]);
    }

    // Customize this method to handle payment_intent.succeeded event
    protected function handlePaymentIntentSucceeded(array $payload)
    {
        // Handle successful payment
    }

    // Customize this method to handle payment_intent.payment_failed event
    protected function handlePaymentIntentPaymentFailed(array $payload)
    {
        // Handle failed payment
    }

    protected function handleCustomerSubscriptionCreated(array $payload)
    {
       
    }
    protected function handleSetupIntentCreated(array $payload)
    {
        Log::channel('stripe')->info('Payment Setup Intent Created Successfully', ['payload' => $request->getContent()]);

         try {
             // Handle the incoming webhook event
             $payload = $request->all();
             $this->handleStripeWebhook($payload);
 
             // Log the success of handling the webhook
             Log::channel('stripe')->info('Payment Setup Intent Created Successfully');
         } catch (\Exception $e) {
             // Log any exceptions that occur during webhook handling
             Log::channel('stripe')->error('Error in Setting Up Intent', ['error' => $e->getMessage()]);
         }
 
         return response()->json(['success' => true]);
    }

}
