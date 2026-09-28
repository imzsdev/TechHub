<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\Guard;

class AccountController extends Controller
{
    /**
     * Display the user's account page.
     */
    public function index(Guard $auth)
    {
        /** @var User $user */
        $user = $auth->user();

        $orders = $user->orders()
            ->latest()
            ->get();

        return view('account.index', compact('user', 'orders'));
    }
}