<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UMSController extends Controller
{
    public function index()
    {
        if (!is_null(Auth::id())) {
            if (auth()->user()->isAdmin()) {
                return redirect()->route('product.index');
            } else {
                return redirect()->route('shop.index');
            }
        } else {
            return redirect()->route('shop.index');
        }
    }
}
// @admin
//     <a href="#">Secret Page</a>
// @else
//     Welcome Guest. <a href="#">Login</a>
// @endadmin
