<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

use InvalidArgumentException;

class PayPalPaymentAdapter implements LegacyPaymentProcessor
{
    public function __construct(
        protected PayPalGateway $paypalGateway
     ) {}

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Le montant ne peux pas être négatif ou nul.");
        }

        $result = $this->paypalGateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'payment_details' => $paymentDetails,
        ]);


        return [
            'transaction_id' => $result['payment_id'],
            'status' => $result['state'] === 'approved' ? 'success' : 'failed',
            'amount' => $result['amount']['total'],
            'currency' => $result['amount']['currency'],
            'timestamp' => strtotime($result['create_time']),
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        return $this->paypalGateway->verifyPayment($transactionId)->state === 'approved'
            ? 'success'
            : 'failed';
    }

    public function refundPayment(string $transactionId): bool{
        return $this->paypalGateway->refund($transactionId)->state === 'completed';
    }
}

