<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Admin</title>
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
            color: #e74c3c;
            margin: 0;
        }
        .info-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #4a90e2;
        }
        .info-box strong {
            color: #4a90e2;
        }
        .message-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #e74c3c;
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
        .type-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .type-signal {
            background-color: #e74c3c;
            color: white;
        }
        .type-contact {
            background-color: #4a90e2;
            color: white;
        }
        .type-order {
            background-color: #27ae60;
            color: white;
        }
        .type-other {
            background-color: #95a5a6;
            color: white;
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
            <h1>Notification Admin</h1>
        </div>
        
        <div class="info-box">
            <p><strong>Nom de l'utilisateur:</strong> {{ $userName }}</p>
            <p><strong>Email de l'utilisateur:</strong> {{ $userEmail }}</p>
            <p><strong>Type de notification:</strong> 
                <span class="type-badge type-{{ $type }}">
                    @if($type === 'signal')
                        Signalement
                    @elseif($type === 'contact')
                        Formulaire de contact
                    @elseif($type === 'order')
                        Commande de chiot
                    @else
                        Autre
                    @endif
                </span>
            </p>
        </div>
        
        @if($type === 'order')
        <div class="order-details">
            <h3>Détails de la commande</h3>
            <p>{{ nl2br(e($messageContent)) }}</p>
        </div>
        @else
        <div class="message-box">
            <h3>Message:</h3>
            <p>{{ nl2br(e($messageContent)) }}</p>
        </div>
        @endif
        
        <div class="footer">
            <p>Ce message a été envoyé automatiquement depuis votre application.</p>
        </div>
    </div>
</body>
</html>