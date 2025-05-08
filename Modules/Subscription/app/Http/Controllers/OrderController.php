<?php

namespace Modules\Subscription\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\App\Services\SubscriptionService;

class OrderController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    // 📦 Affiche la liste des commandes du user connecté
    public function index()
    {
        $orders = $this->subscriptionService->getUserOrders(Auth::user());
        return view('subscription::orders.index', compact('orders'));
    }

    // 🔍 Détail d'une commande
    public function show($id)
    {
        $order = $this->subscriptionService->getOrderById(Auth::user(), $id);
        return view('subscription::orders.show', compact('order'));
    }
}
