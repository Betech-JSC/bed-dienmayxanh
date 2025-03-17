<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Routing\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()
            ->active()
            ->sortByPosition()
            ->get()
            ->map(fn($item) => $item->transform());

        $data = [
            'services' => $services,
        ];

        if (request()->wantsJson()) {
            return response()->json($data);
        }

        return Inertia::render('Services/Index', $data);
    }
}
