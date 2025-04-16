<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

use InvalidArgumentException;
use WpOrg\Requests\Exception\InvalidArgument;

class StripePaymentAdapter implements LegacyPaymentProcessor {
    
    private StripeGateway $gateway;

    public function __construct(StripeGateway $gateway)
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
        $payment = [
            'amount' => $amount,
            'currency' => $currency,
            [
                'card_number' => $paymentDetails['card_number'],
                'expiry_month' => $paymentDetails['expiry_month'],
                'expiry_year' => $paymentDetails['expiry_year'],
                'cvv' => $paymentDetails['cvv']
            ]
        ];
        $result =  $this->gateway->charge($payment);
        return [
            'transaction_id' => $result['id'],
            'status' => $result['status'] === 'succeeded' ? 'success' : 'failed',
            'amount' => $result['amount'],
            'currency' => $result['currency'],
            'timestamp' => $result['created']
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $result = $this->gateway->verifyPayment($transactionId);
        return $result->status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool 
    {
        $result = $this->gateway->refund($transactionId);
        return $result->status === 'refunded' ? true : false;
    }
}