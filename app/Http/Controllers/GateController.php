<?php

namespace App\Http\Controllers;
use App\Models\UserRole;
use App\Models\Ingrediente;
use App\Models\IngredienteType;
use Illuminate\Http\Request;

class GateController extends Controller
{
    function checkLoggedInUser(){
        if (auth()->check()) {
            $user = auth()->user();
            return response()->json(['loggedIn' => true, 'username' => $user->name ]);
        } else {
            return response()->json(['loggedIn' => false]);
        }
     }
     public function show()
     {
        if (auth()->check()) {
            $user = auth()->user();
            if($user->type == UserRole::KUNDE) {
                return view('auth.customerTemplate', compact('user'));
            } else if ($user->type == UserRole::MITARBEITER) {
                $ingredients = Ingrediente::where('type', IngredienteType::FRUITS)->get();
                return view('auth.employeeTemplate', compact('ingredients'));
            } else {
                return view('auth.login');
            }
        } else {
            return view('auth.login');
        }
     }

     public function showFruitsEmployee(Request $request)
     {
         $ingredients = Ingrediente::where('type', IngredienteType::LIQUID)->get();
         return view('auth.employeeTemplate', compact('ingredients'));
     }

     public function showVeggieEmployee(Request $request)
     {
         $ingredients = Ingrediente::where('type', IngredienteType::VEGETABLES)->get();
         return view('auth.employeeTemplate', compact('ingredients'));
     }
     public function showLiquidEmployee(Request $request)
     {
         $ingredients = Ingrediente::where('type', IngredienteType::LIQUID)->get();
         return view('auth.employeeTemplate', compact('ingredients'));
     }
 
     function getUserRole(){
        if (auth()->check()) {
            $user = auth()->user();
            return response()->json(['loggedIn' => true, 'type' => $user->type ]);
        } else {
            return response()->json(['loggedIn' => false]);
        }
     }
}
