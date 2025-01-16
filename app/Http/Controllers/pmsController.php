<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class pmsController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function dashboard(){
        $products = DB::select("
        SELECT p.product_name, c.category_name, s.supplier_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.category_id 
        LEFT JOIN suppliers s ON p.supplier_id = s.supplier_id
    ");

        $prices = DB::select("
        SELECT p.product_name , pr.price 
        FROM products p left join prices pr 
        on p.product_id = pr.product_id;
        ");
        $categories = DB::select("
        SELECT p.product_name , c.category_name , s.supplier_name , pr.price FROM products p left join categories c on p.category_id = c.category_id 
        left join suppliers s on p.supplier_id = s.supplier_id join prices pr 
        on p.product_id = pr.product_id;
    ");
    $suppliers = DB::select("
    select s.supplier_name, count(p.product_id)as total_products, AVG(pr.price) as avg_value_products 
    from products p left join suppliers s on p.supplier_id = s.supplier_id 
    left join prices pr on p.product_id = pr.product_id group by s.supplier_name;
    ");
        return view('dashboard',compact('products','prices','categories','suppliers'));	
    }

    public function user_register(Request $req){
        $validated = $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
        
        if($validated){
            $user = new User;
            $user->first_name = $req->first_name;
            $user->last_name = $req->last_name;
            $user->email = $req->email;
            $user->phone = $req->phone;
            $user->username = $req->username;
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect()->route('login')->with('success','You Registered Successfully, Please Login');
        }
    }

    public function user_check(Request $req)
    {
       
        $credentials = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
     
        if (Auth::attempt($credentials)) {
            $req->session()->put('checkUser', true);
            return response()->json([
                'success' => true,
                'redirect' => route('dashboard'),
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Username or Password',
            ]);
        }
       
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect()->route('admin.login');
    }
    
    
}