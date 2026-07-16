<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ConfirmationEmail;
use App\Mail\OrderNotification;
use App\Mail\ContactNotification;

class EmailController extends Controller
{
    /**
     * Send contact form email to admin
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
  public function sendContactForm(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'breed' => 'nullable|string',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'city' => 'nullable|string',
        'message' => 'required|string',
    ]);

  

    try {
        Log::info('Contact form received:', $validated);
        
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        
        Mail::to($adminEmail)->send(
            new ContactNotification(
                $validated['name'],
                $validated['email'],
                $validated['message'],  // Ceci va dans $userMessage
                $validated['breed'] ?? null,
                $validated['phone'] ?? null,
                $validated['city'] ?? null
            )
        );
        
        Log::info('Contact email sent to admin: ' . $adminEmail);

        return response()->json([
            'success' => true,
            'message' => 'Contact form sent successfully'
        ], 200);
    } catch (\Exception $e) {
        Log::error('Contact form error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to send contact form',
            'error' => $e->getMessage()
        ], 500);
    }
}

    /**
     * Process puppy order - sends confirmation to user and notification to admin
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function processOrder(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string',
            'breed' => 'required|string',
            'puppyName' => 'required|string',
            'email' => 'required|email',
            'whatsapp' => 'required|string',
            'city' => 'required|string',
            'message' => 'nullable|string',
            'language' => 'required|string|in:en,fr,es,de',
        ]);

        try {
            Log::info('Début du traitement de la commande', $validated);

            // Admin email avec fallback
            $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
            Log::info('Email admin configuré: ' . $adminEmail);
            
            // Vérifier la configuration mail
            Log::info('Configuration mail:', [
                'driver' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'from' => config('mail.from.address'),
            ]);

            // Test d'envoi à l'admin D'ABORD
            try {
                Log::info('Tentative d\'envoi à l\'admin: ' . $adminEmail);
                
                Mail::to($adminEmail)->send(
                    new OrderNotification(
                        $validated['fullName'],
                        $validated['email'],
                        $validated['breed'],
                        $validated['puppyName'],
                        $validated['whatsapp'],
                        $validated['city'],
                        $validated['message'] ?? null
                    )
                );
                
                Log::info('Email admin envoyé avec succès à: ' . $adminEmail);
            } catch (\Exception $e) {
                Log::error('ERREUR ENVOI EMAIL ADMIN: ' . $e->getMessage());
                Log::error('Trace: ' . $e->getTraceAsString());
            }
            
            // Envoi à l'utilisateur
            try {
                Log::info('Tentative d\'envoi au user: ' . $validated['email']);
                
                $confirmationLink = env('APP_URL', 'http://localhost') . '/order-confirmation';
                
                Mail::to($validated['email'])->send(
                    new ConfirmationEmail(
                        $validated['fullName'],
                        $validated['language'],
                        $confirmationLink,
                        $validated['puppyName'],
                        $validated['breed'],
                        $validated['email'],
                        $validated['whatsapp'],
                        $validated['city'],
                        $validated['message']
                    )
                );
                
                Log::info('Email utilisateur envoyé avec succès à: ' . $validated['email']);
            } catch (\Exception $e) {
                Log::error('ERREUR ENVOI EMAIL USER: ' . $e->getMessage());
                Log::error('Trace: ' . $e->getTraceAsString());
            }

            return response()->json([
                'success' => true,
                'message' => 'Order processed successfully'
            ], 200);
            
        } catch (\Exception $e) {
            Log::error('ERREUR GLOBALE: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to process order',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}