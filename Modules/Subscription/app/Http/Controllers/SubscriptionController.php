<?php

namespace Modules\Subscription\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



use Modules\Subscription\app\Models\Invoice;  // Make sure you have the Invoice model created

class SubscriptionController extends Controller
{
    public function index()
    {
        // Fetch all invoices along with their associated user and plan details
        $subscriptions = Invoice::with(['user', 'plan'])->get();  // Assuming you have 'user' and 'plan' relationships defined in your Invoice model

        return view('subscription::index', compact('subscriptions'));
    }
}
