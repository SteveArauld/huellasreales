<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', serif;
            line-height: 1.8;
            color: #2c2c2c;
            max-width: 580px;
            margin: 0 auto;
            padding: 50px 20px;
            background-color: #ffffff;
        }
        
        .container {
            background: #ffffff;
        }
        
        .header {
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 400;
            color: #1a1a1a;
            margin: 0;
            letter-spacing: -0.5px;
        }
        
        .header .date {
            font-size: 13px;
            color: #999;
            margin-top: 4px;
        }
        
        .info-item {
            display: flex;
            padding: 6px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-size: 13px;
            color: #888;
            min-width: 110px;
            font-weight: 400;
        }
        
        .info-value {
            font-size: 15px;
            color: #1a1a1a;
        }
        
        .message-block {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e0e0e0;
        }
        
        .message-block h3 {
            font-size: 14px;
            font-weight: 400;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 12px 0;
        }
        
        .message-block p {
            font-size: 15px;
            color: #1a1a1a;
            margin: 0;
            white-space: pre-wrap;
            line-height: 1.8;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #aaa;
            text-align: center;
        }
        
        .footer .brand {
            color: #666;
            font-weight: 400;
        }
        
        @media (max-width: 480px) {
            body {
                padding: 30px 15px;
            }
            
            .header h1 {
                font-size: 20px;
            }
            
            .info-item {
                flex-direction: column;
                padding: 4px 0;
            }
            
            .info-label {
                min-width: auto;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Nouveau message de contact</h1>
            <div class="date">Reçu depuis le formulaire du site</div>
        </div>

        <div class="info-item">
            <span class="info-label">Nom</span>
            <span class="info-value">{{ $userName }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Email</span>
            <span class="info-value">{{ $userEmail }}</span>
        </div>
        @if($breed)
        <div class="info-item">
            <span class="info-label">Race</span>
            <span class="info-value">{{ $breed }}</span>
        </div>
        @endif
        @if($phone)
        <div class="info-item">
            <span class="info-label">Téléphone</span>
            <span class="info-value">{{ $phone }}</span>
        </div>
        @endif
        @if($city)
        <div class="info-item">
            <span class="info-label">Ville</span>
            <span class="info-value">{{ $city }}</span>
        </div>
        @endif

        <div class="message-block">
            <h3>Message</h3>
            <p>{{ nl2br(e($userMessage)) }}</p>
        </div>

        <div class="footer">
            <span class="brand">Alma de Criador</span> · Email automatique
        </div>
    </div>

</body>
</html>