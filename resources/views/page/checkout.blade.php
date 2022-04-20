@extends('master')
@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="index.html">Home</a></li>
                            <li class="is-marked">

                                <a href="checkout.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="checkout-msg-group">
                            <div class="msg u-s-m-b-30">

                                <span class="msg__text">Returning customer?

                                    <a class="gl-link" href="#return-customer" data-toggle="collapse">Click here to login</a></span>
                                <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                    <div class="l-f u-s-m-b-16">

                                        <span class="gl-text u-s-m-b-16">If you have an account with us, please log in.</span>
                                        <form class="l-f__form">
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="login-email">E-MAIL *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail"></div>
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="login-password">PASSWORD *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="login-password" placeholder="Enter Password"></div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-15">

                                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button></div>
                                                <div class="u-s-m-b-15">

                                                    <a class="gl-link" href="lost-password.html">Lost Your Password?</a></div>
                                            </div>

                                            <!--====== Check Box ======-->
                                            <div class="check-box">

                                                <input type="checkbox" id="remember-me">
                                                <div class="check-box__state check-box__state--primary">

                                                    <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                            </div>
                                            <!--====== End - Check Box ======-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="msg">

                                <span class="msg__text">Have a coupon?

                                    <a class="gl-link" href="#have-coupon" data-toggle="collapse">Click Here to enter your code</a></span>
                                <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                    <div class="c-f u-s-m-b-16">

                                        <span class="gl-text u-s-m-b-16">Enter your coupon code if you have one.</span>
                                        <form class="c-f__form">
                                            <div class="u-s-m-b-16">
                                                <div class="u-s-m-b-15">

                                                    <label for="coupon"></label>

                                                    <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Coupon Code"></div>
                                                <div class="u-s-m-b-15">

                                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">APPLY</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->


    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="checkout-f">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                            <form class="checkout-f__delivery" action="{{url('confirmCheckout')}}" method="post">
                                <div class="u-s-m-b-30">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <!--====== First Name, Last Name ======-->
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="billing-fname">FULL NAME *</label>

                                            <input class="input-text input-text--primary-style" value="{{Auth::user()->name}}" name="name"  type="text" id="billing-fname" data-bill=""></div>
                                    </div>
                                    <!--====== End - First Name, Last Name ======-->


                                    <!--====== E-MAIL ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" value="{{Auth::user()->email}}" name="email" type="text" id="billing-email" data-bill=""></div>
                                    <!--====== End - E-MAIL ======-->


                                    <!--====== PHONE ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-phone">PHONE *</label>

                                        <input class="input-text input-text--primary-style" value="{{Auth::user()->phone}}"  name="phone" type="text" id="billing-phone" data-bill=""></div>
                                    <!--====== End - PHONE ======-->


                                    <!--====== Street Address ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-street">STREET ADDRESS *</label>

                                        <input class="input-text input-text--primary-style" value="{{Auth::user()->address}}"  name="address" type="text" id="billing-street" placeholder="House name and street name" data-bill=""></div>
                                    <!--====== End - Street Address ======-->

                                    <div class="u-s-m-b-10">

                                        <label class="gl-label" for="order-note">ORDER NOTE</label><textarea name="note" class="text-area text-area--primary-style" id="order-note"></textarea></div>
                                    <div>

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">PLACE ORDER</button></div>
                                </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__item-wrap gl-scroll">
                                        <?php $content=Cart::Content() ?>
                                        @if(Cart::count()>0)
                                        @foreach($content as $item)
                                        <div class="o-card">
                                            <div class="o-card__flex">
                                                <div class="o-card__img-wrap">

                                                    <img class="u-img-fluid" src="images/product/{{$item->options->has('img')?$item->options->img:''}}" alt=""></div>
                                                <div class="o-card__info-wrap">

                                                    <span class="o-card__name">

                                                        <a href="product-detail.html">{{$item->name}}</a></span>

                                                    <span class="o-card__quantity">x {{$item->qty}}</span>

                                                    <span class="o-card__price">{{number_format($item->price)}} đ</span></div>
                                            </div>

                                            <a class="o-card__del far fa-trash-alt deleteCart" data-id="{{$item->rowId}}"></a>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>{{Cart::subtotal(0,'.',',')}} đ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                        <form class="checkout-f__payment">
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="cash-on-delivery" name="payment">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="pay-pal" name="payment" value="momopay">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="pay-pal">VN Pay</label></div>
                                                </div>
                                                <!--====== End - Radio Box ======-->
                                            </div>
                                            <div>

                                                {{-- <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Order Summary ======-->
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>
@endsection()