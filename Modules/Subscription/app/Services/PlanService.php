<?php

namespace Modules\Subscription\App\Services;

use Modules\Subscription\App\Models\Plan;

class PlanService
{
    public function create(array $data): Plan
    {
        $periodicityMap = [
            '1' => 'Monthly',
            '3' => 'Quarterly',
            '12' => 'Annually'
        ];

        $data['periodicity_type'] = $periodicityMap[$data['periodicity']] ?? 'Unknown';
        $data['status'] = isset($data['status']) ? 1 : 0;

        $plan = Plan::create([
            'name' => $data['name'],
            'grace_days' => $data['grace_days'],
            'price_HT' => $data['price_HT'],
            'price' => $data['price'],
            'periodicity_type' => $data['periodicity_type'],
            'currency' => $data['currency'],
            'role_id' => $data['assigned_role'],
            'status' => $data['status'],
        ]);

        // ✅ Attacher les features avec leurs charges
        $this->syncFeatures($plan, $data);

        return $plan;
    }

    public function update(Plan $plan, array $data): Plan
    {
        $periodicityMap = [
            '1' => 'Monthly',
            '3' => 'Quarterly',
            '12' => 'Annually'
        ];

        $data['periodicity_type'] = $periodicityMap[$data['periodicity']] ?? 'Unknown';
        $data['status'] = isset($data['status']) ? 1 : 0;

        $plan->update([
            'name' => $data['name'],
            'grace_days' => $data['grace_days'],
            'price_HT' => $data['price_HT'],
            'price' => $data['price'],
            'periodicity_type' => $data['periodicity_type'],
            'currency' => $data['currency'],
            'role_id' => $data['assigned_role'],
            'status' => $data['status'],
        ]);

        // ✅ Synchroniser les features
        $this->syncFeatures($plan, $data);

        return $plan;
    }

    // ✅ Factoriser le code de synchronisation des features
    private function syncFeatures(Plan $plan, array $data): void
    {
        $pivotData = [];

        if (!empty($data['features'])) {
            foreach ($data['features'] as $featureId) {
                $rawValue = $data['feature_values'][$featureId] ?? null;

                $converted = match (strtolower(trim((string) $rawValue))) {
                    'oui', 'yes', 'true', '1' => 1,
                    'non', 'no', 'false', '0' => 0,
                    default => (is_numeric($rawValue) ? floatval($rawValue) : 0),
                };

                $pivotData[$featureId] = [
                    'charges' => $converted,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        $plan->features()->sync($pivotData);
    }
}
