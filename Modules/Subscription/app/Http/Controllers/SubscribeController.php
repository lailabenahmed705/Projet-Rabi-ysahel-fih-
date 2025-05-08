<?php

namespace Modules\Subscription\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\App\Services\SubscriptionService;
use Modules\Subscription\App\Models\Subscription;
use Modules\Subscription\App\Models\Plan;
use Modules\Users\App\Models\User;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

class SubscribeController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Affiche toutes les souscriptions (pour admin).
     */
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'plan'])->get();
        return view('subscription::subscriptions.index', compact('subscriptions'));
    }

    /**
     * Permet à l'utilisateur d'afficher ses propres souscriptions.
     */
    public function mySubscription()
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->with('plan')
            ->latest('starts_at')
            ->first();

        return view('subscription::subscriptions.my-subscription', compact('subscription'));
    }

    /**
     * Affiche les plans d'abonnement pour les personnels médicaux (frontend Mediplus).
     */
    public function showFrontendPlans()
    {
        $plans = Plan::with('features')->get();
        return view('mediplus.pages.plans', compact('plans'));
    }
    
    public function checkout($planId)
{
    $plan = Plan::findOrFail($planId);
    return view('mediplus.pages.checkout', compact('plan'));
}

 

public function pay(Request $request)
{
    $request->validate([
        'plan_id' => 'required|exists:plans,id',
        'card_name' => 'required|string',
        'card_number' => 'required|string',
        'expiry_date' => 'required|string',
        'cvv' => 'required|string',
    ]);

    $plan = Plan::findOrFail($request->plan_id);
    $user = Auth::user();

    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        // ⚠️ Dans un vrai projet, utilisez Stripe Elements ou Checkout
        $charge = Charge::create([
            'amount' => $plan->price * 100, // en centimes
            'currency' => 'TND', // adapte selon ton projet
            'description' => 'Paiement abonnement: ' . $plan->name,
            'source' => 'tok_visa', // test token (dans un vrai cas, cela vient du frontend Stripe.js)
        ]);

        $this->subscriptionService->subscribe($user, $plan->id);

        return redirect()->route('dashboard')->with('success', 'Paiement réussi, abonnement activé !');
    } catch (\Exception $e) {
        return back()->with('error', 'Erreur de paiement : ' . $e->getMessage());
    }
}

    
}
