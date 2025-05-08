<?php

namespace Modules\Subscription\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Subscription\app\Models\Plan;
use Modules\International\app\Models\TaxRule;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show(Request $request, $planId)
    {
        // ✅ Vérifier que le plan existe
        try {
            $plan = Plan::findOrFail($planId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Plan not found');
        }

        // ✅ Vérifier que l'utilisateur est connecté
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // ✅ Récupérer le nom du premier rôle avec Spatie
        $roleName = $user->getRoleNames()->first() ?? 'default';

        // Initialisation des variables de pays et de devise
        $countryId = null;
        $currency = null;

        // ✅ Déterminer la devise selon le rôle
        switch ($roleName) {
            case 'pharmacy':
                $currency = optional($user->pharmacy)->currency->symbol ?? '€';
                break;

            case 'clinique':
                $currency = 'dt'; // dinar tunisien par défaut
                break;

            default:
                $currency = optional($user->medicalTeam)->currency->symbol ?? '€';
                break;
        }

        // ✅ Déterminer le pays selon le rôle
        switch ($roleName) {
            case 'pharmacy':
                $countryId = $user->pharmacy->country_id ?? null;
                break;

            case 'clinique':
                $countryId = 224; // ID de pays par défaut pour les cliniques
                break;

            default:
                $countryId = $user->medicalTeam->country_id ?? null;
                break;
        }

        // ❌ Aucun pays associé
        if (!$countryId) {
            return redirect()->back()->with('error', 'No country associated with the user');
        }

        // ✅ Calcul des taxes
        $totalTaxes = 0;
        $taxDetails = [];

        $taxRules = TaxRule::with('tax')->where('country_id', $countryId)->get();

        foreach ($taxRules as $rule) {
            if (isset($rule->tax)) {
                $calculatedTax = $rule->tax->calculateFor($plan->price);
                $totalTaxes += $calculatedTax;
                $taxDetails[] = [
                    'name' => $rule->tax->name,
                    'rate' => $rule->tax->rate,
                    'type' => $rule->tax->type,
                    'amount' => $calculatedTax,
                ];
            }
        }

        // ✅ Calcul total
        $totalPrice = $plan->price;
        $priceExcludingTaxes = $plan->price - $totalTaxes;

        // ✅ Générer un identifiant de commande
        $orderIdentifier = 'OR' . sprintf('%05d', mt_rand(0, 99999));

        // ✅ Retourner la vue avec les données
        return view('checkout.checkout', [
            'plan' => $plan,
            'totalTaxes' => $totalTaxes,
            'priceExcludingTaxes' => $priceExcludingTaxes,
            'totalPrice' => $totalPrice,
            'currency' => $currency,
            'orderIdentifier' => $orderIdentifier,
            'taxDetails' => $taxDetails,
        ]);
    }
}
