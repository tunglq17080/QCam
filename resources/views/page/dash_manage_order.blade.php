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

                                <a href="dash-manage-order.html">My Account</a></li>
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
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                <div class="dash__pad-1">

                                    <span class="dash__text u-s-m-b-16">Hello, John Doe</span>
                                    <ul class="dash__f-list">
                                        <li>

                                            <a class="dash-active" href="dashboard.html">Manage My Account</a></li>
                                        <li>

                                            <a href="dash-my-profile.html">My Profile</a></li>
                                        <li>

                                            <a href="dash-address-book.html">Address Book</a></li>
                                        <li>

                                            <a href="dash-track-order.html">Track Order</a></li>
                                        <li>

                                            <a href="dash-my-order.html">My Orders</a></li>
                                        <li>

                                            <a href="dash-payment-option.html">My Payment Options</a></li>
                                        <li>

                                            <a href="dash-cancellation.html">My Returns & Cancellations</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                <div class="dash__pad-1">
                                    <ul class="dash__w-list">
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                <span class="dash__w-text">{{$total}}</span>

                                                <span class="dash__w-name">Orders Placed</span></div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Cancel Orders</span></div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Wishlist</span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <div class="dash-l-r">
                                        <div>
                                            <div class="manage-o__text-2 u-c-secondary">Order #{{$order->order_id}}</div>
                                            <div class="manage-o__text u-c-silver">Placed on 26 Oct 2016 09:08:37</div>
                                        </div>
                                        <div>
                                            <div class="manage-o__text-2 u-c-silver">Total:

                                                <span class="manage-o__text-2 u-c-secondary">$16.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <div class="manage-o">
                                        <div class="manage-o__header u-s-m-b-30">
                                            <div class="manage-o__icon"><i class="fas fa-box u-s-m-r-5"></i>

                                                <span class="manage-o__text">Package 1</span></div>
                                        </div>
                                        <div class="dash-l-r">
                                            <div class="manage-o__text u-c-secondary">Delivered on 26 Oct 2016</div>
                                            <div class="manage-o__icon"><i class="fas fa-truck u-s-m-r-5"></i>

                                                <span class="manage-o__text">Standard</span></div>
                                        </div>
                                        <div class="manage-o__timeline">
                                            <div class="timeline-row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Processing</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Shipped</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Delivered</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="manage-o__description">
                                            <div class="description__container">
                                                <div class="description__img-wrap">

                                                    <img class="u-img-fluid" src="images/product/{{$product->image}}" alt=""></div>
                                                <div class="description-title">{{$product->name}}</div>
                                            </div>
                                            <div class="description__info-wrap">
                                                <div>

                                                    <span class="manage-o__text-2 u-c-silver">Quantity:

                                                        <span class="manage-o__text-2 u-c-secondary">1</span></span></div>
                                                <div>

                                                    <span class="manage-o__text-2 u-c-silver">Total:

                                                        <span class="manage-o__text-2 u-c-secondary">{{number_format($product->unit_price)}} đ</span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-lg-6">
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-3">
                                            <h2 class="dash__h2 u-s-m-b-8">Shipping Address</h2>
                                            <h2 class="dash__h2 u-s-m-b-8">John Doe</h2>

                                            <span class="dash__text-2">4247 Ashford Drive Virginia - VA-20006 - USA</span>

                                            <span class="dash__text-2">(+0) 900901904</span>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-lg-6">
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                        <div class="dash__pad-3">
                                            <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Total</div>
                                                <div class="manage-o__text-2 u-c-secondary">{{number_format($product->unit_price)}} đ</div>
                                            </div>

                                            <span class="dash__text-2">Paid by Cash on Delivery</span>
                                        </div>
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
</div>
@endsection()