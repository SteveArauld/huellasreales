<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle commande de chiot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #27ae60;
            margin: 0;
        }
        .order-details {
            background-color: #e8f4f8;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #27ae60;
        }
        .order-details p {
            margin: 8px 0;
        }
        .customer-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4a90e2;
        }
        .customer-info p {
            margin: 8px 0;
        }
        .message-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #e74c3c;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 30px;
        }
        .label {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🐕 Nouvelle commande de chiot</h1>
        </div>
        
        <div class="order-details">
            <h3>Détails de la commande</h3>
            <p><span class="label">Nom du chiot:</span> <strong>{{ $puppyName }}</strong></p>
            <p><span class="label">Race:</span> <strong>{{ $breed }}</strong></p>
        </div>
        
        <div class="customer-info">
            <h3>Informations du client</h3>
            <p><span class="label">Nom complet:</span> {{ $fullName }}</p>
            <p><span class="label">Email:</span> {{ $userEmail }}</p>
            <p><span class="label">WhatsApp:</span> {{ $whatsapp }}</p>
            <p><span class="label">Ville:</span> {{ $city }}</p>
        </div>
        
        @if(!empty($userMessage))
        <div class="message-box">
            <h3>Message du client</h3>
            <p>{{ nl2br(e($userMessage)) }}</p>
        </div>
        @endif
        
        <div class="footer">
            <p>Ce message a été envoyé automatiquement depuis votre application.</p>
        </div>
    </div>
</body>
</html>