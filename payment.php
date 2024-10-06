<?php

require __DIR__ . '/vendor/autoload.php';

use YooKassa\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// If form is submitted
$PRICE = $_POST["price"];
if (!empty($_POST)) {

    // data
    $PRICE = $_POST["price"];
    $CATEGORY = $_POST["category"];

    try {

        // env
        $LOGIN = $_ENV["SHOP_ID"];
        $PASSWORD = $_ENV["SECRET_KEY"];

        // $TEST_LOGIN = $_ENV["TEST_SHOP_ID"];
        // $TEST_PASSWORD = $_ENV["TEST_SECRET_KEY"];

        // Yookassa Initialization
        $client = new Client();
        $client->setAuth($LOGIN, $PASSWORD);

        if ((int)$CATEGORY === 3) {
            $payment = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => $PRICE,
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => 'https://www.example.com/return_url',
                    ),
                    'payment_method_data' => array(
                        'type' => 'sber_loan',
                    ),
                    'receipt' => array(
                        'items' => array(
                            array(
                                'description' => 'Заказ №1',
                                'quantity' => 1,
                                'amount' => array(
                                    'value' => $PRICE,
                                    'currency' => 'RUB',
                                ),
                                'vat_code' => 1, // Example VAT code, adjust as needed
                                'payment_subject' => 'commodity', // Set appropriate payment_subject
                                'payment_mode' => 'full_payment', // Set payment mode if necessary
                            ),
                        ),
                        'customer' => array(
                            'full_name' => 'Имя Фамилия', // Customer's full name
                            'email' => 'customer@example.com', // Customer's email
                            // or
                            'phone' => '+79001234567', // Customer's phone number
                        ),
                    ),
                    'capture' => false,
                    'description' => 'Заказ №1',
                ),
                uniqid('', true)
            );
        } else {
            $payment = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => $PRICE,
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => 'https://www.example.com/return_url',
                    ),
                    'payment_method_data' => array(
                        'type' => 'bank_card',
                    ),
                    'receipt' => array(
                        'items' => array(
                            array(
                                'description' => 'Заказ №1',
                                'quantity' => 1,
                                'amount' => array(
                                    'value' => $PRICE,
                                    'currency' => 'RUB',
                                ),
                                'vat_code' => 1, // Example VAT code, adjust as needed
                                'payment_subject' => 'commodity', // Set appropriate payment_subject
                                'payment_mode' => 'full_payment', // Set payment mode if necessary
                            ),
                        ),
                        'customer' => array(
                            'full_name' => 'Имя Фамилия', // Customer's full name
                            'email' => 'customer@example.com', // Customer's email
                            // or
                            'phone' => '+79001234567', // Customer's phone number
                        ),
                    ),
                    'capture' => false,
                    'description' => 'Заказ №1',
                ),
                uniqid('', true)
            );
        }

        // Redirection code
        $confiramtion_url = $payment->getConfirmation()->getConfirmationUrl();
        header("Location: " . $confiramtion_url);
        exit(200);
    } catch (\YooKassa\Common\Exceptions\ApiException $e) {
        // Log the error message for debugging
        echo "Error: ". $e->getMessage();
        // Optionally, display a user-friendly error message
    }
}
