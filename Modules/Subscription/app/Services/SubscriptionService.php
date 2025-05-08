<?php

namespace Modules\Subscription\App\Services;

use Modules\Subscription\App\Models\Subscription;
use Modules\Subscription\App\Models\Order;
use Modules\Subscription\App\Models\Invoice;
use Modules\Subscription\App\Models\Payment;
use Modules\Subscription\App\Models\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class SubscriptionService
{
    // Crée un abonnement complet (commande + souscription + facture + paiement)
    public function subscribe(User $user, int $planId)
    {
        return DB::transaction(function () use ($user, $planId) {
            $plan = Plan::findOrFail($planId);

            $order = Order::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'status' => 'paid',
                'total_price' => $plan->price,
            ]);

            $subscription = Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'price' => $plan->price,
                'role' => 'client',
                'starts_at' => now(),
                'ends_at' => now()->addMonths(max(1, $plan->invoice_months)), // ✅ Correction ici
            ]);

            $invoice = Invoice::create([
                'order_identifier' => 'INV-' . strtoupper(Str::random(6)),
                'total_price' => $plan->price,
                'user_email' => $user->email,
                'user_name' => $user->name,
                'user_id' => $user->id,
            ]);

            Payment::create([
                'reference' => 'PAY-' . strtoupper(Str::random(10)),
                
                'order_id' => $order->id, // 🔁 Lien direct à la commande
                'amount' => $plan->price,
                'user_id' => $user->id,
            ]);

            return $subscription;
        });
    }

    public function cancel(Subscription $subscription)
    {
        $subscription->ends_at = now();
        $subscription->save();
    }

    public function isActive(User $user): bool
    {
        return Subscription::where('user_id', $user->id)
            ->where('ends_at', '>=', now())
            ->exists();
    }

    // ➕ Nouveaux helpers utilisés dans les contrôleurs
    public function getUserOrders(User $user)
    {
        return Order::where('user_id', $user->id)->latest()->get();
    }

    public function getOrderById(User $user, $id)
    {
        return Order::where('id', $id)->where('user_id', $user->id)->firstOrFail();
    }

    public function getUserPayments(User $user)
    {
        return Payment::where('user_id', $user->id)->latest()->get();
    }

    public function getPaymentById(User $user, $id)
    {
        return Payment::where('id', $id)->where('user_id', $user->id)->firstOrFail();
    }
    public function getUserInvoices(User $user)
{
    return Invoice::where('user_id', $user->id)->latest()->get();
}

public function getInvoiceById(User $user, $id)
{
    return Invoice::where('id', $id)->where('user_id', $user->id)->firstOrFail();
}

}