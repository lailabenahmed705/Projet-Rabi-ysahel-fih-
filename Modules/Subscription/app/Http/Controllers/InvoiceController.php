<?php

namespace Modules\Subscription\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\App\Services\SubscriptionService;

class InvoiceController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    // 📅 Liste des factures de l'utilisateur connecté
    public function index()
    {
        $invoices = $this->subscriptionService->getUserInvoices(Auth::user());
        return view('subscription::invoices.index', compact('invoices'));
    }

    // 🔍 Détail d'une facture
    public function show($id)
    {
        $invoice = $this->subscriptionService->getInvoiceById(Auth::user(), $id);
        return view('subscription::invoices.show', compact('invoice'));
    }
}
