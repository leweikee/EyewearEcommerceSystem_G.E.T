<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Brand;

class ItemController extends Controller
{

    public function index(Request $request, $categoryName = null)
    {
        $brandID = $request->input('brandid');

        $query = Item::join('brand', 'item.brandID', '=', 'brand.brandID')
            ->select('item.*', 'brand.brandName');

        if ($categoryName && $categoryName !== 'all') {
            $query->where('item.category', $categoryName);
        }

        if ($brandID) {
            $query->where('brand.brandID', $brandID);
        }

        $item = $query->paginate(12);

        // Fetch brands based on the category for sunglasses and contact lenses
        $brands = Brand::when(in_array($categoryName, ['sunglasses', 'contactlens']), function ($query) use ($categoryName) {
            $query->whereHas('items', function ($query) use ($categoryName) {
                $query->where('category', $categoryName);
            });
        })->get();

            return view('item.index', compact('item', 'brands', 'categoryName'));
    }

    public function categoryredirect(Request $request, $categoryName)
    {
        // $item = Item::where('category', $categoryName)->get();

        // return view('item.index', compact('item'));

        $item = Item::join('brand', 'item.brandID', '=', 'brand.brandID')
            ->where('item.category', $categoryName)
            ->select('item.*', 'brand.brandName')
            ->paginate(12);

        return view('item.index', compact('item'));
    }

    public function product_details($id)
    {
        $item = Item::find($id);
        return view('product_details', compact('item'));
    }

    public function add_cart(Request $request, $id)
    {
        error_log('Selected Power: ' . $request->powers);
        if(Auth::id()) {
            $user = Auth::user();
            $item = Item::find($id);
                    // Check whether the number of requests exceeds the inventory
        $requestedQuantity = $request->quantity;
        if ($requestedQuantity > $item->quantity) {
            return redirect()->back()->with('error', 'Product quantity is insufficient');
        }
        
            // Check if the item already exists 
            $existingCartItem = Cart::where('user_id', $user->id)->where('Product_id', $item->itemID)->first();
            $requestedQuantity = $request->quantity;
            $selectedPower = $request->powers;
            if($existingCartItem) 
            {
                //  requestquantity need <= quantity
                if (($requestedQuantity + $existingCartItem->quantity) > $item->quantity) 
                {
                    return redirect()->back()->with(['error' => 'Product quantity is insufficient']);
                }

                if ($selectedPower != $existingCartItem->powers) //auto create a new object when powers is different
                {
                    $cart = new Cart;
                    $cart->powers = $selectedPower;
                    $cart->name = $user->name;
                
                    $cart->user_id = $user->id;
                    $cart->cartName = $item->name;
    
                    if($item->disPrice) 
                    {
                        $cart->price = $item->disPrice;
                    } else 
                    {
                        $cart->price = $item->price;
                    }
                    $cart->colour = $item->colour;
                    $cart->image = $item->image;
                    $cart->Product_id = $item->itemID;
                    $cart->quantity = $request->quantity;
                    $cart->subtotal = $cart->price * $cart->quantity;
                    $cart->save();
                }
                else
                {
                    // If  already exists, update the quantity
                    $existingCartItem->quantity += $request->quantity;
                    $existingCartItem->powers = $selectedPower;
                    $existingCartItem->subtotal = $existingCartItem->price * $existingCartItem->quantity;
                    $existingCartItem->save();
                }   
            } 
            else 
            {
                //  not exist, add a new entry to the cart
                $cart = new Cart;
                $cart->powers = $selectedPower;
                $cart->name = $user->name;
                
                $cart->user_id = $user->id;
                $cart->cartName = $item->name;
    
                if($item->disPrice) {
                    $cart->price = $item->disPrice;
                } else {
                    $cart->price = $item->price;
                }
                $cart->colour = $item->colour;
                $cart->image = $item->image;
                $cart->Product_id = $item->itemID;
                $cart->quantity = $request->quantity;
                $cart->subtotal = $cart->price * $cart->quantity;
                $cart->save();

            }
    
            return redirect()->back()->with('success', 'Product added to cart successfully');
        } 
        else 
        {
            return redirect('/login');
        }
    }
}

