<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\Ingredient;
use App\Models\IngredientType;
use Illuminate\Http\Request;
use App\Models\Preset;
use Illuminate\Support\Facades\Auth;

class GateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /* Compared to vue, we also need the following methods, since the router view, with which the new views are integrated in vue, is omitted */
    public function show()
    {
        return view('landingpageTemplate');
    }
    // Make sure the user is an employee before the view can be loaded. If not, load the login form
    public function employeeView()
    {
        if (Auth::user()->type == UserRole::MITARBEITER) {
            // As an employee, a list of all ingredients is displayed. Starting with the fruit. That's why we initially filter for the fruit
            return redirect()->route('showFruitsEmployee');
        } else {
            return view('auth.login');
        }
    }
    // Make sure the user is authenticated before the view can be loaded. If not, load the login form
    public function customerView()
    {
        if (Auth::user()) {
            // the user-specific presets are listed in the customer view. So we give the view the list of presets directly so that we can save ourselves a GET request to the database
            $userPresets = Preset::where('user_id', Auth::user()->id)->pluck('name');
            return view('auth.customerTemplate', compact('userPresets'));
        } else {
            return view('auth.login');
        }
    }

    // If the employee selects one of the following lists from the employee template, the respective list of ingredients should be returned
    public function showFruitsEmployee(Request $request)
    {
        $ingredients = Ingredient::where('type', IngredientType::FRUITS)->get();
        return view('auth.employeeTemplate', compact('ingredients'));
    }
    public function showVeggieEmployee(Request $request)
    {
        $ingredients = Ingredient::where('type', IngredientType::VEGETABLES)->get();
        return view('auth.employeeTemplate', compact('ingredients'));
    }
    public function showLiquidEmployee(Request $request)
    {
        $ingredients = Ingredient::where('type', IngredientType::LIQUID)->get();
        return view('auth.employeeTemplate', compact('ingredients'));
    }
}