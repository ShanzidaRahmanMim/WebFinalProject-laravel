<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ShippingInfo;
use App\Models\Order;
use Auth;
use Stripe;
use Session;

use Illuminate\Http\Request;

class ClientController extends Controller
{
   public function CategoryPage($id)
   { $category = Category::findOrFail($id);
     $products = Product::where('product_category_id',$id)->latest()->get();
       return view('user_template.category',compact('category','products'));
   }
    public function SingleProduct($id)
    {     $product=Product::findOrFail($id);
          //$cat_name=Product::findOrFail($category_name);
         $cat_id=Product::where('id',$id)->value('product_category_id');
         $related_products=Product::where('product_category_id',$cat_id)->latest()->get();
         return view('user_template.product',compact('product','related_products'));
    } 
    public function AddToCart()
    { $userid=Auth::id();
     $cart_items=Cart::where('user_id',$userid)->get();
         return view('user_template.addtocart',compact('cart_items'));
    }


     public function AddProductToCart(Request $request)
     { $product_price=$request->price;
          $quantity=$request->quantity;
          $price=$product_price*$quantity;
      Cart::insert([
          'product_id'=>$request->product_id,
          'user_id'=>Auth::id(),
          'quantity'=>$request->quantity,
          'price'=>$price,
      ]);
      return redirect()->route('addtocart')->with('message','Product added to cart successfully');
     }
     public function RemoveCartItem($id)
     {
         Cart::findOrFail($id)->delete();
         return redirect()->route('addtocart')->with('message','Product removed from cart successfully');
     }

     public function GetShippingAddress()
     {
         return view('user_template.shippingaddress');
     }
     public function AddShippingAddress(Request $request)
     {
         $request->validate([
             'phone_number'=>'required',
             'city_name'=>'required',
             'postal_code'=>'required',
         ]);
         ShippingInfo::insert([
             'user_id'=>Auth::id(),
             'phone_number'=>$request->phone_number,
             'city_name'=>$request->city_name,
             'postal_code'=>$request->postal_code,
         ]);
         return redirect()->route('checkout');
     }
    public function Checkout()
    {     $userid=Auth::id();
          $cart_items=Cart::where('user_id',$userid)->get();
          $shipping_address=ShippingInfo::where('user_id',$userid)->first();
         return view('user_template.checkout',compact('cart_items','shipping_address'));
    }
    // public function payment(Request $request)
    // {

    // }
    public function PlaceOrder(){
     $userid=Auth::id();
     $shipping_address=ShippingInfo::where('user_id',$userid)->first();
     $cart_items=Cart::where('user_id',$userid)->get();
     foreach($cart_items as $item){
           Order::insert([
                'userid'=> $userid,
                'shipping_phoneNumber'=>$shipping_address->phone_number,
                'shipping_city'=>$shipping_address->city_name,
                'shipping_postalCode'=>$shipping_address->postal_code,
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'total_price'=>$item->price,
           ]);
            //    $id=$item->id;
            //    Cart::findOrFail($id)->delete();
      
     }
    //  ShippingInfo::where('user_id',$userid)->delete();
     return redirect()->route('pendingorders')->with('message','Order placed successfully');
    }
    public function PayOnline($total)
    {
         return view('user_template.payment',compact('total'));
    }

    public function stripePost(Request $request, $total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment" 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function UserProfile()
    {   
        $userid = Auth::id();
        $confirmed_orders = Order::where('userid', $userid)->where('status', 'confirmed')->latest()->get();

         return view('user_template.userprofile', compact('confirmed_orders'));
    }
    public function PendingOrders()
    {     //$pending_orders=Order::where('status','pending')->latest()->get();
          $userid=Auth::id();
          $pending_orders=Order::where('userid',$userid)->where('status','pending')->latest()->get();
          
         return view('user_template.pendingorders',compact('pending_orders'));
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function Search(Request $request)
        {
            $query = $request->input('query');

        // Searching in the 'product_name' and 'product_short_des' columns of the 'products' table
        $products = Product::where('product_name', 'LIKE', "%{$query}%")
                            ->orWhere('product_short_des', 'LIKE', "%{$query}%")
                            ->orderBy('product_name')
                            ->get();

        return view('user_template.search', compact('products', 'query'));
        }

        public function Show($slug)
        {
            $product = Product::where('slug', $slug)->firstOrFail();
            return view('user_template.products_show', compact('product'));
        }
    public function NewRelease()
    {
         return view('user_template.newrelease');
    }
    public function TodaysDeal()
    {
         return view('user_template.todaysdeal');
    }
    public function CustomerService()
    {
         return view('user_template.customerservice');
    }
}
