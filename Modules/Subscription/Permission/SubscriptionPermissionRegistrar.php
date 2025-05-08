<?php

namespace Modules\Subscription\Permission;

use Modules\Permission\Traits\PermissionGenerator;

class SubscriptionPermissionRegistrar
{
    use PermissionGenerator;

    public function registerPermissions()
    {
        // On se base uniquement sur les modèles que tu possèdes réellement
        $this->generateCrudPermissionsFor('feature');
        $this->generateCrudPermissionsFor('fatureConsumption');
        $this->generateCrudPermissionsFor('featurePlan');
        $this->generateCrudPermissionsFor('invoice');
        $this->generateCrudPermissionsFor('order');
        $this->generateCrudPermissionsFor('payment');
        $this->generateCrudPermissionsFor('plan');
        $this->generateCrudPermissionsFor('subscription');
        $this->generateCrudPermissionsFor('subscriptionRenewal');


    }
}
