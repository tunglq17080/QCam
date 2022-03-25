<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use App\Models\OrderProduct;
use Cart;
use Mail;
use App\Http\Requests\CreateCheckoutRequest;
use DB;
use Session;
use Carbon\Carbon;
// use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listcart()
    {
        return view('page.shopping-cart');
    }
    
    public function checkout()
    {
        if(Auth::user() && Cart::count() > 0 ) {
            return view('page.checkout');
        }
        if(Auth::user() && Cart::count() == 0 ) {
            return redirect()->back()->with('flash_message', 'Giỏ hàng còn trống');
        }
        return redirect()->back()->with('flash_message', 'Vui lòng đăng nhập trước khi đặt hàng');
    }

    public function confirmCheckout(Request $request)      
    {

        $price = Cart::subtotal(0,'.','');
        $cart=Cart::Content();
        // dd($cart);
        $bill = new Order;
        $bill->user_id = Auth::id();
        $bill->name = $request->name;
        $bill->phone = $request->phone;
        $bill->address = $request->address;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = Cart::subtotal(0,'.','');
        $bill->payment = 'COD';
        $bill->note = $request->note;
        $bill->status = 0;
        $bill->save();
        foreach($cart as $item)
        {
            $billDetail = new OrderProduct;
            $billDetail->order_id = $bill->id;
            $billDetail->product_id = $item->id;
            $billDetail->quantity = $item->qty;
            $billDetail->unit_price = $item->price;
            $billDetail->save();
        }
        Cart::destroy();
        $data = ['bill' => $bill];
        // Mail::send('page.mails.blank',$data,function($msg) {
        //     $msg->from('thanhungdn92@gmail.com', 'Sweet Bakery Store');
        //     $msg->to(Auth::user()->email, Auth::user()->name)->subject('Thông tin đặt hàng của bạn');
        // });
        if( $request->payment_method == "ATM" ){
            // return dd($price);
            $vnp_code = $this->generateRandomString();
            Session::put('vnp_code', $vnp_code);
            Session::put('bill_id', $bill->id);
            $url = $this->vnPay($vnp_code,$price);
            return redirect($url);
        }
        return redirect('/')->with('flash_message', 'Đặt hàng thành công!');    
    }

    public function confirmVnPay(Request $request)   {
        if ( $request->vnp_TxnRef == session('vnp_code') ){
            Bill::where('id',session('bill_id'))->update(['status'=>1]);
            return redirect('index')->with('flash_message', 'Đặt hàng thành công!');
        }
    }
    
    /**
     * Generate random string
     *  */ 
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /**
     * Input: vnp_code, price
     * Output: url to payment vnpay sanbox page
     *  */ 
    public function vnPay($vnp_code, $price)
    {
        // Set param vnpay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // $vnp_Returnurl = "https://45cm.com/";
        $vnp_Returnurl = url('') . "/confirmVnPay";
        $vnp_TmnCode = "ZZZ697SV";//Mã website tại VNPAY 
        $vnp_HashSecret = "XEPVQWDSFUFLALRKEQBRLELNPNNYKZFQ"; //Chuỗi bí mật

        $vnp_TxnRef = $vnp_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toan san pham. So tien ".$price." VND";
        $vnp_OrderType = "other";
        // $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Amount = $price * 100;
        $vnp_Locale = "vn";
        // $vnp_BankCode = "VNPAYQR";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // sort array data
        ksort($inputData);
        // define var
        $query = "";
        $i = 0;
        $hashdata = "";
        // merge array data to string
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        // add hash
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return $vnp_Url;
    }
    public function deleteBill($id){
        $bill = Bill::findOrFail($id);
        //$bill_detail = BillDetail::where('bill_id','=',$id)->delete();
        $bill->delete();
        return redirect()->back();
    }
    public function index()
    {
        //
    }
    public function insertOrder(){
        $arr =  array("COD","MOMPAY","Bitcoins");
        for( $i = 0; $i < 20000; $i++ ){
            $randMonth = rand(3,6);
            $randPay = rand(0,2);
            $bill = new Order;
            $bill->user_id = 2;
            $bill->name = 'Test Order';
            $bill->phone = '09050000000';
            $bill->address = 'RM4C+7PH, Phú Nhuận, Thành phố Hồ Chí Minh, Vietnam';
            $bill->date_order = date('Y-m-d', strtotime("+".$randMonth." months", strtotime(date("Y-m-d H:i:s"))));
            $bill->total = rand(10000,99999999999);
            // $bill->payment = $arr[$randPay];
            $bill->payment = 'MOMPAY';
            $bill->note = 'Test Order';
            $bill->status = 0;
            $bill->save();
        }
    }

    public function analysis(){
        // $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        // $dateE = Carbon::now()->startOfMonth(); 
        // dd(date("m") + 3);
        $arrRes = [];
        for($i = 1; $i < 10; $i++){
            $cod = DB::table('orders')
            ->whereMonth('date_order', date('m') + $i)
            ->where('payment', 'COD')
            ->sum('total');
            $momo = DB::table('orders')
            ->whereMonth('date_order', date('m') + $i)
            ->where('payment', 'MOMPAY')
            ->sum('total');
            $bitcoins = DB::table('orders')
            ->whereMonth('date_order', date('m') + $i)
            ->where('payment', 'Bitcoins')
            ->sum('total');
            $arr = array(
                "period" => date('Y-m-d', strtotime("+".$i." months", strtotime(date("Y-m-d H:i:s")))),
                "cod" => $cod,
                "momo" => $momo,
                "bitcoins" => $bitcoins
            );
            array_push($arrRes, $arr);
        }
        return response()->json($arrRes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill $bill)
    {
        //
    }
}
