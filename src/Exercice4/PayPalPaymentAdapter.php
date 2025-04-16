<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

use InvalidArgumentException;

class PaypalPaymentAdapter implements LegacyPaymentProcessor {

    private PayPalGateway $gateway;

    public function __construct(PayPalGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if (!$amount || $amount <= 0) {
            throw new InvalidArgumentException('Veuillez fournir un montant valide');
        }
        if (!$currency) {
            throw new InvalidArgumentException('Veuillez fournir une currency valide');
        }
        
        $array = [
            'amount' => $amount,
            'currency' => $currency,
            [
                'email' => $paymentDetails['email'],
                'paypal_token' => $paymentDetails['paypal_token']
            ]
        ];
        $result = $this->gateway->charge($array);
        return [
            'transaction_id' => $result['payment_id'],
            'status' => $result['state'] === 'approved' ? 'success' : 'failed',
            'amount' => $result['amount']['total'],
            'currency' => $result['amount']['currency'],
            'timestamp' => $result['create_time']
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $result = $this->gateway->verifyPayment($transactionId);
        return $result->state === 'approved' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool 
    {
        $result = $this->gateway->refund($transactionId);
        return $result->state  === 'completed' ? true : false;
    }
}