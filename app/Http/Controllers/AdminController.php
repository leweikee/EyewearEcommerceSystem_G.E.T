<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderedItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function adminHome()
    {
        $totalProducts=Item::count();
        $totalBrands=Brand::count();

        $todayDate=Carbon::now()->format('d-m-Y');

        $totalOrder=Order::count();
        $todayOrder=Order::whereDate('order_date',$todayDate)->count();



        return view('admin.home',compact('totalProducts','totalBrands','todayDate','totalOrder','todayOrder'));
    }

    public function manageBrands()
    {
        return view('admin.manageBrand');
    }

    public function manageOrder()
    {
        $orders = Order::with('orderItems', 'deliveryAddress')->orderBy('orderID', 'desc')->get();

        return view('admin.manageOrder', compact('orders'));
    }

    public function orderDetail($id) {

        $order = Order::with('orderItems.item')->find($id);
    
        if ($order) {
            return view('admin.orderDetail', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No Order Found');
        }
    }

    public function orderToShip($id) {
        
        $order = Order::find($id);

        if($order->status == 'Paid') {
            $order->status = 'To Ship';
            $order->save();
            return redirect()->back()->with('message','Status Updated Successfully');
        }

    }

    // public function viewReport() {

    //     $itemCategories = ['sunglasses', 'contactlens'];

    //     $categoryQuantities = [];

    //     foreach ($itemCategories as $category) {
    //         $totalQuantity = OrderedItem::whereHas('item', function ($query) use ($category) {
    //             $query->where('category', $category);
    //         })->sum('Quantity');
        
    //         // dd($totalQuantity); // Add this line for debugging
        
    //         $categoryQuantities[$category] = $totalQuantity;
    //     }

    //     $brand = Brands::all();

    //     return view('admin.report', compact('categoryQuantities'));
    // }

    public function viewReport() {
        // Categories
        $itemCategories = ['sunglasses', 'contactlens'];
        $categoryQuantities = [];
    
        foreach ($itemCategories as $category) {
            $totalQuantity = OrderedItem::whereHas('item', function ($query) use ($category) {
                $query->where('category', $category);
            })->sum('Quantity');
    
            $categoryQuantities[$category] = $totalQuantity;
        }
    
        // Brands
        $brandQuantities = [];
    
        // Assuming there is a relationship between OrderedItem and Item with brandID
        $items = OrderedItem::with('item')->get();
    
        foreach ($items as $oitem) {
            $brandID = $oitem->item->brandID;
        
            if (!isset($brandQuantities[$brandID])) {
                $brandQuantities[$brandID] = 0;
            }
        
            // Use $oitem instead of $item
            $brandQuantities[$brandID] += $oitem->Quantity;
        }
        
    
        $brands = Brand::all();
    
        return view('admin.report', compact('categoryQuantities', 'brandQuantities', 'brands'));
    }
    

    public function orderShipped(Request $request, $id) {
        
        $order = Order::find($id);

        if($order->status == 'To Ship') {
        
        $order->trackingID = $request->tnum;
        $order->status = 'Shipped';
        $order->shipped_date = now();
        $order->save();

        return redirect()->back()->with('message','Brand Added Successfully');
        }
    }

    public function addBrands(Request $request)
    {
        $brands = new Brand;
        $brands->brandName=$request->brandName;
        $brands->save();

        return redirect()->back()->with('message','Brand Added Successfully');
    }

    public function viewBrands()
    {
        $brands = Brand::all();
        return view('admin.manageBrand', compact('brands'));
    }


    public function deleteBrands($brandID){
     $associatedItemsCount = Item::where('brandID', $brandID)->count();

     if ($associatedItemsCount > 0) {
        session()->flash('error', 'Cannot delete brand. It has associated items.');
        return redirect()->back();
     }
     else{
 
     $brands = Brand::find($brandID);
 
     if ($brands) {
         $brands->delete();
         return redirect()->back()->with('message', 'Brand deleted successfully');
     }
     }
    }

    public function manageProducts()
    {
        return view('admin.manageProduct');
    }

    public function addProducts(Request $request)
    {

        $items = new Item;
        $items->name = $request->name;
        $items->description = $request->description;
        $items->colour = $request->colour;
        $items->quantity = $request->quantity;
        $items->price = $request->price;
        $items->disPrice = $request->input('disPrice') ?? null;
        $items->brandID = $request->brandID;
        $items->category = $request->category;

        $image = $request->file('image');
        $imgname = time() . '.' . $image->getClientOriginalExtension();
        $image->move('product', $imgname);
        $items->image = $imgname;

        if ($items->disPrice>=$items->price) {
            return redirect()->back()->with('message', 'Discount Price cannot be higher than Regular Price');
        }   
        else{

            $items->save();

            return redirect()->back()->with('message', 'Product Added Successfully');
        }
    }

    public function showProducts()
    {
        $items=Item::all();
        return view('admin.showProduct',compact('items'));
    }


    public function deleteProducts($itemID)
    {
        $items=Item::find($itemID);
        $items->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
       
    }

    public function viewProducts()
    {
        $brands = Brand::all();
        return view('admin.addProduct', compact('brands'));
    }

    public function updateProducts($itemID)
    {
        $items = Item::find($itemID);
        $brands = Brand::all();
    
        return view('admin.updateProduct', compact('items', 'brands'));
    }

    public function updateProductsConfirm(Request $request, $itemID)
    {
        $item = Item::find($itemID);

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'colour' => $request->colour,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'disPrice' => $request->filled('disPrice') ? $request->disPrice : null,
            'brandID' => $request->brandID,
            'category' => $request->category,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imageName);
            $item->image = $imageName;
        }

        if ($item->disPrice >= $item->price) {
            return redirect()->back()->with('message', 'Discount Price cannot be higher than Regular Price');
        }

        $item->save();

        // Update the item's price in associated cart items
        $associatedCartItems = Cart::where('Product_id', $itemID)->get();
        foreach ($associatedCartItems as $cartItem) {
            $cartItem->price = $item->disPrice == null ? $item->price : $item->disPrice;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        }

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    function getCategoryDisplayName($categoryValue) {
        $categoryMapping = [
            'sunglasses' => 'Sunglasses',
            'lens' => 'Contact Lens',
        ];
    
        return $categoryMapping[$categoryValue] ?? $categoryValue;
    }
    
}