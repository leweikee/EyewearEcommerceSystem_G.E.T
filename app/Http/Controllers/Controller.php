<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderedItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function create()
    {
        return view('login'); 
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', 
            'password_confirmation' => 'required|min:6', 
            'phoneNum' => 'required|min:10',
        ]);

        $existingUser = User::where('name', $request->input('name'))->first();
        if ($existingUser) {
            return redirect()->back()->withErrors(['name' => 'Username already exists']);
        }
        
        if (strlen($request->input('password')) < 6) {
            return redirect()->back()->withErrors(['password' => 'Password must be at least 6 characters']);
        }

        if ($request->input('password') !== $request->input('password_confirmation')) {
            return redirect()->back()->withErrors(['password_confirmation' => 'Password must have the same confirmation password']);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phoneNum' => $request->input('phoneNum'),
            'role' => 0,
            
        ]);


        return redirect('/login')->with('success', 'Your account has been successfully created.');
    }

    public function viewOrderList()
    {
        $orders = Order::join('users', 'orders.userID', '=', 'users.id')
                       ->select('orders.*', 'users.name as name')
                       ->where('orders.userID', Auth::user()->id)
                       ->orderBy('orders.order_date', 'desc')
                       ->get();
    
        return view('custOrderList', compact('orders'));
    }

    public function viewOrderDetail($orderID)
    {
        $order = Order::with('orderItems.item')->find($orderID);
    
        if ($order) {
            return view('custOrderDetail', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No Order Found');
        }
    }
    public function updateCancelOrder(Request $request, $orderID) {
        $order = Order::find($orderID); 
        $order->status = 'Canceled'; 
        $order->save();
    
        return redirect()->back();
    }

    public function updateCompleteOrder(Request $request, $orderID) {
        $order = Order::find($orderID); 
        $order->status = 'Completed'; 
        $order->save();
    
        return redirect()->back();
    }
}



