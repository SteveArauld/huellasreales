<!DOCTYPE html>
<html lang="{{ $language }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('emails.order_confirmation_title') }}</title>
    <style>
        /* Reset styles */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f4f6f9;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #2d3748;
            -webkit-font-smoothing: antialiased;
        }
        
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f6f9;
            padding: 20px;
        }
        
        .email-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        
        .header-section {
            background-color: #ffffff;
            padding: 30px 40px 20px;
            text-align: center;
        }
        
        .logo {
            max-width: 180px;
            height: auto;
            margin-bottom: 20px;
        }
        
        .divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            margin: 0 auto 25px;
            border-radius: 2px;
        }
        
        .header-title {
            color: #1a202c;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }
        
        .body-section {
            background-color: #ffffff;
            padding: 10px 40px 30px;
        }
        
        .greeting {
            font-size: 16px;
            color: #4a5568;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        
        .highlight-box {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-left: 4px solid #667eea;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        
        .highlight-box h3 {
            color: #667eea;
            margin: 0 0 15px 0;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .info-row {
            display: flex;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            flex-shrink: 0;
        }
        
        .info-label {
            color: #a0aec0;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            min-width: 100px;
        }
        
        .info-value {
            color: #2d3748;
            font-weight: 600;
            font-size: 14px;
        }
        
        .details-box {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .details-box h3 {
            color: #48bb78;
            margin: 0 0 15px 0;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .message-box {
            background-color: #fffbeb;
            border-left: 4px solid #f6ad55;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        
        .message-box h3 {
            color: #ed8936;
            margin: 0 0 10px 0;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .message-content {
            color: #4a5568;
            font-style: italic;
            line-height: 1.8;
        }
        
        .next-steps {
            background-color: #edf2f7;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }
        
        .next-steps p {
            margin: 0;
            color: #4a5568;
            font-size: 14px;
            line-height: 1.8;
        }
        
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 12px 35px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            margin: 20px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }
        
        .footer-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px 40px;
            text-align: center;
        }
        
        .footer-logo {
            max-width: 120px;
            height: auto;
            margin-bottom: 15px;
            filter: brightness(0) invert(1);
        }
        
        .footer-text {
            color: #e2e8f0;
            font-size: 11px;
            line-height: 1.8;
            margin: 5px 0;
        }
        
        .social-links {
            margin-top: 15px;
        }
        
        .social-link {
            display: inline-block;
            margin: 0 8px;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
        }
        
        @media only screen and (max-width: 480px) {
            .header-section, .body-section {
                padding-left: 20px;
                padding-right: 20px;
            }
            
            .info-row {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .info-label {
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            
            <!-- Header con logo -->
            <div class="header-section">
                <img src="{{ $message->embed(public_path('assets/logo/logo.png')) }}" alt="Logo" class="logo">
                <div class="divider"></div>
                <h1 class="header-title">🐾 ¡Confirmación de su Pedido!</h1>
            </div>
            
            <!-- Contenido principal -->
            <div class="body-section">
                
                <!-- Saludo -->
                <div class="greeting">
                    ¡Hola <strong>{{ $name }}</strong>! 👋
                </div>
                
                <p class="greeting" style="margin-top: 0;">
                    Gracias por su interés en nuestros cachorros. Hemos recibido su solicitud correctamente y nuestro equipo se pondrá en contacto con usted en las próximas 24-48 horas para brindarle más información y confirmar los detalles de su pedido.
                </p>
                
                <!-- Detalles del pedido -->
                @if($puppyName && $breed)
                <div class="highlight-box">
                    <h3>🐶 Datos del Cachorro Solicitado</h3>
                    <div class="info-row">
                        <span class="info-label">🐾 Nombre</span>
                        <span class="info-value">{{ $puppyName }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">🏷️ Raza</span>
                        <span class="info-value">{{ $breed }}</span>
                    </div>
                </div>
                @endif
                
                <!-- Información de contacto -->
                @if($email || $whatsapp || $city)
                <div class="details-box">
                    <h3>📋 Sus Datos de Contacto</h3>
                    @if($email)
                    <div class="info-row">
                        <span class="info-label">✉️ Correo Electrónico</span>
                        <span class="info-value">{{ $email }}</span>
                    </div>
                    @endif
                    @if($whatsapp)
                    <div class="info-row">
                        <span class="info-label">📱 WhatsApp</span>
                        <span class="info-value">{{ $whatsapp }}</span>
                    </div>
                    @endif
                    @if($city)
                    <div class="info-row">
                        <span class="info-label">📍 Ciudad</span>
                        <span class="info-value">{{ $city }}</span>
                    </div>
                    @endif
                </div>
                @endif
                
                <!-- Mensaje del cliente -->
                @if(!empty($userMessage))
                <div class="message-box">
                    <h3>💬 Su Mensaje</h3>
                    <p class="message-content">{{ nl2br(e($userMessage)) }}</p>
                </div>
                @endif
                
                <!-- Próximos pasos -->
                <!-- <div class="next-steps">
                    <p><strong>⏰ ¿Qué sigue?</strong></p>
                    <p>Un miembro de nuestro equipo revisará su solicitud y se comunicará con usted a través de WhatsApp o correo electrónico para:</p>
                    <p style="margin-top: 10px;">
                        ✅ Confirmar la disponibilidad del cachorro<br>
                        ✅ Proporcionar información detallada sobre el proceso de adopción<br>
                        ✅ Coordinar los próximos pasos para la entrega
                    </p>
                </div> -->
      
                
                <p style="color: #718096; font-size: 13px; text-align: center; margin-top: 20px;">
                    Si tiene alguna pregunta urgente, no dude en contactarnos por WhatsApp al número que aparece en nuestro sitio web.
                </p>
                
            </div>
            
            <!-- Footer -->
            <div class="footer-section">
                <img src="{{ $message->embed(public_path('assets/logo/logo.png')) }}" alt="Logo" class="footer-logo">
                <p class="footer-text">Gracias por confiar en nosotros ❤️</p>
                <p class="footer-text">© {{ date('Y') }} Todos los derechos reservados</p>
                <p class="footer-text">Este correo fue enviado automáticamente. Por favor, no responda a este mensaje.</p>
                
            </div>
            
        </div>
    </div>
</body>
</html>