<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include('stripe/init.php');

class Stripegateway {

    public function __construct() {
        
    }

    public function checkout($data) {

        $stripe_secret_key = $data['stripe_secret_key'];
        \stripe\Stripe::setApiKey($stripe_secret_key);
        try {
            $charge = \stripe\Charge::create(array(
                        'source' => $data['stripe_token'],
                        'amount' => $data['amount'],
                        'currency' => $data['currency'],
                        'description' => $data['description']
            ));
            return $charge;
        } catch (Exception $e) {
            return $e;
            //print($e);
        }
    }

    public function create_plan($data) {
        $stripe_secret_key = $data['stripe_secret_key'];

        \stripe\Stripe::setApiKey($stripe_secret_key);

        $planPrice = $data['amount'];
        $planName = $data['title'];
        $currency = $data['currency'];
        $planInterval = 'month';
        $priceCents = round($planPrice * 100);

        try {
            $plan = \stripe\Plan::create(array(
                        "product" => [
                            "name" => $planName
                        ],
                        "amount" => $priceCents,
                        "currency" => $currency,
                        "interval" => $planInterval,
                        "interval_count" => 1
            ));
            return $plan;
//            $plan->id
        } catch (Exception $e) {
            return $e;
//            $api_error = $e->getMessage(); 
        }
    }

    public function subscribe_plan($data) {
        $stripe_secret_key = $data['stripe_secret_key'];

        \stripe\Stripe::setApiKey($stripe_secret_key);

        $customer = \Stripe\Customer::create(array(
                    'email' => $data['email'],
                    'source' => $data['stripe_token']
        ));

        $plan_id = $data['plan_id'];
        try {
            $subscription = \Stripe\Subscription::create(array(
                        "customer" => $customer->id,
                        "items" => array(
                            array(
                                "plan" => $plan_id,
                            ),
                        ),
            ));
            return $subscription;
        } catch (Exception $e) {
            echo $api_error = $e->getMessage();
            return $api_error;
        }
    }

    function cancel_plan($data) {
        $stripe_secret_key = $data['stripe_secret_key'];

        try {
            $stripe = new \Stripe\StripeClient(
                    $stripe_secret_key
            );
            $subscription = $stripe->subscriptions->cancel(
                    $data['transaction_id']
            );
            return $subscription;
        } catch (Exception $e) {
            $api_error = $e->getMessage();
            return $api_error;
        }
    }

    function check_subscription($data) {
        $stripe_secret_key = $data['stripe_secret_key'];

        try {
            $stripe = new \Stripe\StripeClient(
                    $stripe_secret_key
            );
            $subscription = $stripe->subscriptions->retrieve(
                    $data['transaction_id']
            );
            return $subscription;
        } catch (Exception $e) {
            $api_error = $e->getMessage();
            return $api_error;
        }
    }

    public function stripe_add_customer($data) {
        $stripe_secret_key = $data['stripe_secret_key'];

        \stripe\Stripe::setApiKey($stripe_secret_key);

        $user = $data['user'];
        try {
            $account = \Stripe\Account::create([
                        'country' => 'US',
                        'type' => 'express',
                        'email' => $user['email'],
                        'capabilities' => [
                            'card_payments' => [
                                'requested' => true,
                            ],
                            'transfers' => [
                                'requested' => true,
                            ],
                        ],
            ]);
        } catch (Exception $e) {
            echo $api_error = $e->getMessage();
        }
        return $account->id;
    }

    public function stripe_connect($data) {
        $stripe_secret_key = $data['stripe_secret_key'];

        \stripe\Stripe::setApiKey($stripe_secret_key);
        $user = $data['user'];
// Add customer to stripe 

        try {
            $account_links = \Stripe\AccountLink::create([
                        'account' => $data['account_id'],
                        'refresh_url' => 'https://lookhu.tv/admin/refreshstripeconnect',
                        'return_url' => 'https://lookhu.tv/admin/returnstripeconnect',
                        'type' => 'account_onboarding',
            ]);
        } catch (Exception $e) {
            echo $api_error = $e->getMessage();
        }
        return $account_links->url;
    }
    public function stripe_payout($data) {
        $stripe_secret_key = $data['stripe_secret_key'];

        \stripe\Stripe::setApiKey($stripe_secret_key);
        $stripe_account_id = $data['stripe_account_id'];
        $balance = number_format((float)$data['balance'], 2, '.', '');
// Add customer to stripe 

        try {
              $payment_intent = \Stripe\Transfer::create([
                "amount" => $balance*100,
                "currency" => "usd",
                "destination" => $stripe_account_id,
            ]);
              return $payment_intent;
        } catch (Exception $e) {
            return $api_error = $e->getMessage();
        }
    }

}
