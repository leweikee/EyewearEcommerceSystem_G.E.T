<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Item;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function checkoutOrder(Request $request)
    {
        

        if ($request->isMethod('post')) {
            \Stripe\Stripe::setApiKey(config('stripe.sk'));
            $orderData = $request->all();

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'MYR',
                            'product_data' => [
                                'name' => 'Gorgeous Eyes Care Enterprise',
                            ],
                            'unit_amount' => $orderData['totalPayment'] * 100,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('checkoutOrder'),
            ]);

            session(['orderData' => $request->all()]);

            return redirect()->away($session->url);
        }

        // Handle the GET request for showing the checkout page
        return view('checkoutOrder');
    }

    public function success()
    {
        $orderData = session('orderData');

        // Insert order and order items into the database
        $order = new Order;
        $order->userID = auth()->id(); 
        $order->order_date = now();
        $order->shipping_fee = $orderData['shippingFee'];
        $order->total_price = $orderData['totalPayment'];
        $order->status = 'Paid'; 
        $order->shipped_date = null;
        $order->trackingID = null;
        $order->addressID = $orderData['selectedAddressID'];
        $address = Address::find($orderData['selectedAddressID']);
        $order->recipientName = $address->recipientName;
        $order->recipientAddress = $address->address . ', ' . $address->city . ' ' . $address->postcode . ', ' . $address->state;
        $order->recipientPhoneNum = $address->recipientPhoneNum;
        $order->save();

        $checkoutItem = json_decode($orderData['checkoutItem']);

        foreach ($checkoutItem as $selectItem) {
            $orderedItem = new OrderedItem();
            $orderedItem->OrderID = $order->orderID;
            $orderedItem->ItemID = $selectItem->Product_id;
            $orderedItem->Quantity = $selectItem->quantity;
            $orderedItem->power = $selectItem->powers;
            $orderedItem->save();

            $this->removeItemFromCart($selectItem->id);
            $this->reduceItemQuantity($selectItem->Product_id, $selectItem->quantity);
        }

        // Clear the session data
        session()->forget('orderData');


        return view('success');
    }

    private function removeItemFromCart($itemId)
    {
        $cart=cart::find($itemId);

        $cart->delete();

    }

    private function reduceItemQuantity($itemId, $quantity)
{
    $item = Item::find($itemId);

    if ($item) {
        $item->quantity = max(0, $item->quantity - $quantity);
        $item->save();
    }
}
}
