<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlarmRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlarmController extends Controller
{
    public function store(StoreAlarmRequest $request)
    {
        // For Testing: without auth!
        $user = User::query()->latest()->first();
        Auth::login($user);

        if (Auth::user()->alarms()->count() >= 10) {
            return response()->json(['message' => 'You can register up to 10 alarms.'], 400);
        }

        $alarm = Auth::user()->alarms()->create([
            'source' => $request->source,
        ]);

        return response()->json(['message' => 'Alarm successfully registered.'], 201);
    }
}
