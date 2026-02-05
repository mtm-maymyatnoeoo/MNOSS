<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\DeliveryCargo;


class DeliveryCargoController extends Controller
{
        /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        $cargos = DeliveryCargo::all(); // or paginate()
        return view('settings.delivery_cargo.index', compact('cargos'));
    }
}
