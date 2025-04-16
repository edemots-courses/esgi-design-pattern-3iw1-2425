# Exercice 4 - Adapter

## Contexte

Votre entreprise de commerce électronique utilise actuellement un système de paiement ancien, mais doit s'intégrer à des fournisseurs de paiement modernes. Au lieu de réécrire l'intégralité du code de traitement des paiements, vous devez créer des adaptateurs pour les nouvelles passerelles de paiement tout en conservant l'interface existante.

## Sujet

Créez des adaptateurs pour deux passerelles de paiement modernes (Stripe et PayPal) qui fonctionnent avec votre ancien système de traitement des paiements.

### Pré-requis

Maintenir l'interface existante `LegacyPaymentProcessor`. Le résultat attendu de la méthode `processPayment` doit être sous la forme :

```php
[
    'transaction_id' => string,
    'status' => 'success'|'failed',
    'amount' => float,
    'currency' => string,
    'timestamp' => int,
]
```

Créer des adaptateurs pour :
- Passerelle de paiement Stripe
- Passerelle de paiement PayPal

Prise en charge de différentes méthodes de paiement :
- Carte de crédit
- Portefeuille numérique
- Virement bancaire

### Règles métier

#### Paypal

Considérant que nous utilisons un package qui intéragit avec l'API de Paypal, voici les données attendues et retournées par la méthode `charge` :

Entrée
```php
[
    'amount' => float,
    'currency' => string,
    'payment_details' => [
        'email' => string,
        'paypal_token' => string,
    ],
]
```

Sortie
```php
[
    'payment_id' => string,
    'state' => 'approved',
    'amount' => [
        'total' => float,
        'currency' => string
    ],
    'create_time' => string
]
```

#### Stripe

Considérant que nous utilisons un package qui intéragit avec l'API de Stripe, voici les données attendues et retournées par la méthode `charge` :

Entrée
```php
[
    'amount' => float,
    'currency' => string,
    'payment_details' => [
        'card_number' => string,
        'expiry_month' => string,
        'expiry_year' => string,
        'cvv' => string,
    ],
]
```

Sortie
```php
[
    'id' => 'string',
    'status' => 'succeeded',
    'amount' => float,
    'currency' => string,
    'created' => int
]
```

#### Traitement des paiements
- Doit valider le montant du paiement (> 0)
- Doit fournir l'identifiant de la transaction
- Doit gérer la conversion des devises
- Doit fournir le statut du paiement

#### Traitement des erreurs
- Montant invalide
- Paiements refusés
- Erreurs de réseau
- Informations d'identification non valides
