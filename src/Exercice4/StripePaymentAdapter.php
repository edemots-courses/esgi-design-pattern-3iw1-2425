<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

use InvalidArgumentException;

class StripePaymentAdapter implements LegacyPaymentProcessor
{
    public function __construct(
        protected StripeGateway $stripeGateway
     ) {}

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Le montant ne peux pas être négatif ou nul.");
        }

        $result = $this->stripeGateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'payment_details' => $paymentDetails,
        ]);

        return [
            'transaction_id' => $result['id'],
            'status' => $result['status'] === 'succeeded' ? 'success' : 'failed',
            'amount' => $result['amount'],
            'currency' => $result['currency'],
            'timestamp' => $result['created'],
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        return $this->stripeGateway->verifyPayment($transactionId)->status === 'succeeded'
            ? 'success'
            : 'failed';

        // if ($result->status === 'succeeded') {
        //     return 'success';
        // }
        // return 'failed';
        // return $result->status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        return $this->stripeGateway->refund($transactionId)->status === 'refunded';
    }
}
