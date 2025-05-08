<?php

namespace Modules\Subscription\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\App\Services\SubscriptionService;

class PaymentController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    // 💳 Liste des paiements de l’utilisateur connecté
    public function index()
    {
        $payments = $this->subscriptionService->getUserPayments(Auth::user());
        return view('subscription::payments.index', compact('payments'));
    }

    // 🔍 Détail d’un paiement
    public function show($id)
    {
        $payment = $this->subscriptionService->getPaymentById(Auth::user(), $id);
        return view('subscription::payments.show', compact('payment'));
    }
}
