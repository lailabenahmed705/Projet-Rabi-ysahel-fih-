<?php

namespace Modules\Appointments\app\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Appointments\app\Events\AppointmentCreated;
use Modules\Appointments\app\Listeners\NotifyMedicalTeam;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AppointmentCreated::class => [
            NotifyMedicalTeam::class,
        ],
    ];
}
