<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Address;

class HomeController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();


            $role = $user->role;

            if ($role == 1) {
                return redirect('/admin/home');
            } else {
                // return view('login_successful');
                // session()->flash('cart', Cart::where('user_id', $user->id)->get());

                return redirect('/');
            }
        } else {

            return redirect()->back()->with('error', 'Invalid username or password . Please try again.');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function show_cart()
    {
        if (Auth::id()) 
        {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', $id)->get();

            $selectedItems = collect(request('selectedItems'));

            $totalQuantity = 0;
            $totalAmount = 0;

            foreach ($cart as $cartItem) {
                // Fetch the item by its ID
                $item = Item::find($cartItem->Product_id);
            
                // Check if the item exists
                if ($item) {
                    // Fetch the latest price from the Item model
                    $cartItem->price = $item->price;
                
                    // Recalculate the subtotal based on the updated price
                    $cartItem->subtotal = $cartItem->price * $cartItem->quantity;
                }
            }
    
            return view('/show_cart', compact('cart', 'totalQuantity', 'totalAmount'));
        } 
        else 
        {
            return redirect('/login');
        }
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);

        $cart->delete();
        
        return redirect()->back()->with('success', 'Product has been deleted.');

    }

    public function update_cart($id)
{
    $newQuantity = request('quantity');

    $cartItem = Cart::find($id);

    if (!$cartItem) {
        // Handle the case where the cart item with the given ID is not found.
        return response()->json(['error' => 'Cart item not found'], 404);
    }

    $item = Item::find($cartItem->Product_id);

    if ($item->quantity == 0) {
        return redirect()->back()->with('error', 'Product is out of stock');
    } elseif ($newQuantity > $item->quantity) {
        return redirect()->back()->with('error', 'Product quantity is insufficient');
    }

    // update to cart
    $cartItem->quantity = $newQuantity;
    $cartItem->subtotal = $cartItem->price * $newQuantity;
    $cartItem->save();


    return redirect()->back()->with('success', 'Cart updated successfully');
}


    public function show_profile() {
        $id = Auth::id();
        $useraddress = Address::where('userID', $id)->get()->sortByDesc('is_default');
        return view('custProfile', compact('useraddress'));
    }
    
    public function update_profile(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNum = $request->phoneNum;

        $user->save();
        return redirect()->back();
    }

    // public function checkout($selectedItems)
    // {
    //     $selectedItemIds = explode(',', $selectedItems);

    //     // Fetch cart items using the selected IDs
    //     $checkoutItem = Cart::whereIn('id', $selectedItemIds)->get();

    //     // Calculate the total price and pass it to the view
    //     $totalPrice = $checkoutItem->sum('subtotal');

    //     // Get the default address for the user
    //     $deliveryAdd = Address::where('userID', Auth::id())->where('is_default', 1)->first();

    //     // Get all user addresses (including non-default ones) for the select list
    //     $userAdd = Address::where('userID', Auth::id())->get();

    //     $shippingFee = $this->calculateShippingFee($deliveryAdd->state);
    //     $totalPayment = $shippingFee + $totalPrice;

    //     return view('/checkout', compact('checkoutItem', 'selectedItemIds', 'totalPrice','deliveryAdd','userAdd', 'shippingFee', 'totalPayment'));
    // }

    public function checkout($selectedItems)
    {
        $selectedItemIds = explode(',', $selectedItems);

        // Fetch only the selected items from the cart
        $checkoutItem = Cart::whereIn('id', $selectedItemIds)->get();

        // Calculate the total price for selected items
        $totalPrice = $checkoutItem->sum('subtotal');

        $add = Address::where('userID', Auth::id())->get();
 
        //check user has address to checkout or not, if no, ask them to create one first
        if(!$add->isEmpty()) {
            // Get the default address for the user
            $deliveryAdd = Address::where('userID', Auth::id())->where('is_default', 1)->first();
            // Get all user addresses (including non-default ones) for the select list
            $userAdd = Address::where('userID', Auth::id())->get();

            $shippingFee = $this->calculateShippingFee($deliveryAdd->state);
            $totalPayment = $shippingFee + $totalPrice;

            return view('/checkout', compact('checkoutItem', 'selectedItemIds', 'totalPrice','deliveryAdd','userAdd', 'shippingFee', 'totalPayment'));
        } else {
            $str = 'You do not have an address. Please add one first. <a href="' . url('/custProfile') . '">Click to Add Address</a>';
            return redirect()->back()->with('error', $str);
        }
    }

    private function calculateShippingFee($state)
    {
        // Check the state and set the shipping fee accordingly
        if ($state == 'Sabah' || $state == 'Sarawak' || $state == 'Labuan') {
            return 15; // Shipping fee for Sabah, Sarawak, Labuan
        } else {
            return 7; // Shipping fee for other states
        }
    }

    public function add_address(Request $request, $id)
    {
        $address = new Address;
        $address->userID = $id;
        $address->recipientName = $request->recipientName;
        $address->recipientPhoneNum = $request->recipientPhoneNum;
        $address->address = $request->address;
        $address->postcode = $request->postcode;
        $address->city = $request->city;
        $address->state = $request->state;

        $userAddressesCount = Address::where('userID', $id)->count();
        if($userAddressesCount < 1) {
            $address->is_default = 1;
        }
        else {
            if ($request->has('is_default')) {
                // If the user wants to set this address as default, update existing default addresses
                Address::where('userID', $id)->update(['is_default' => 0]);
    
                $address->is_default = 1;
            } else {
                $address->is_default = 0;
            }
        }

        

        $address->save();

        return redirect()->back()->with('message', 'Address Added Successfully');
    }

    public function edit_address(Request $request, $id, $addressID)
    {

        $address = Address::find($addressID);

        $address->recipientName = $request->recipientName;
        $address->recipientPhoneNum = $request->recipientPhoneNum;
        $address->address = $request->address;
        $address->postcode = $request->postcode;
        $address->city = $request->city;
        $address->state = $request->state;

        if ($request->has('is_default')) {
            // If the user wants to set this address as default, update existing default addresses
            Address::where('userID', $id)->update(['is_default' => 0]);

            $address->is_default = 1;
        } else {
            $address->is_default = 0;
        }

        $address->save();
        return redirect()->back()->with('message', 'Address Added Successfully');
    }

    public function delete_address($addressID)
    {

        $address = Address::find($addressID);

        $address->delete();
        
        return redirect()->back()->with('message', 'Address Added Successfully');
    }

    public function set_default_address($id, $addressID)
    {

        Address::where('userID', $id)->update(['is_default' => 0]);

        // Fetch the address by its ID
        $address = Address::find($addressID);

        // Check if the address is found
        if ($address) {
            // Set is_default to 1 for the selected address
            $address->is_default = 1;
            $address->save();

            return redirect()->back()->with('message', 'Address set as default successfully');
        } else {
            return redirect()->back()->with('error', 'Address not found');
        }
    }

    public function show_promotion() {

        $promoItems = Item::whereNotNull('disPrice')->paginate(12);

        return view('promotion', compact('promoItems'));
    }

}

