@extends('master')
@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="shop-w-master">
                        <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                            <span>FILTERS</span></h1>
                        <div class="shop-w-master__sidebar sidebar--bg-snow">
                            <div class="u-s-m-b-30">
                                <div class="shop-w">
                                    <div class="shop-w__intro-wrap">
                                        <h1 class="shop-w__h">CATEGORY</h1>

                                        <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                                    </div>
                                    <div class="shop-w__wrap collapse show" id="s-category">
                                        <ul class="shop-w__category-list gl-scroll">
                                            <li class="has-list">

                                                <a href="#">Category</a>

                                                <span class="category-list__text u-s-m-l-6">(23)</span>

                                                <span class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                                                <ul style="display:block">
                                                @foreach ($categorys as $category)
                                                <li class="has-list">

                                                    <a href="/category/{{$category->id}}">{{$category->name}}</a>

                                                    {{-- <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                                    <ul>
                                                        <li>

                                                            <a href="#">3d Printer</a></li>
                                                        <li>

                                                            <a href="#">3d Printing Pen</a></li>
                                                        <li>

                                                            <a href="#">3d Printing Accessories</a></li>
                                                        <li>

                                                            <a href="#">3d Printer Module Board</a></li>
                                                    </ul> --}}
                                                </li>
                                                @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="shop-p">
                        <div class="shop-p__toolbar u-s-m-b-30">
                            <div class="shop-p__meta-wrap u-s-m-b-60">

                                <span class="shop-p__meta-text-1">FOUND {{count($products)}} RESULTS</span>
                            </div>
                            <div class="shop-p__tool-style">
                                <div class="tool-style__group u-s-m-b-8">

                                    <span class="js-shop-grid-target is-active">Grid</span>

                                    <span class="js-shop-list-target">List</span></div>
                                <form>
                                    <div class="tool-style__form-wrap">
                                        <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                <option>Show: 8</option>
                                                <option selected>Show: 12</option>
                                                <option>Show: 16</option>
                                                <option>Show: 28</option>
                                            </select></div>
                                        <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                <option selected>Sort By: Newest Items</option>
                                                <option>Sort By: Latest Items</option>
                                                <option>Sort By: Best Selling</option>
                                                <option>Sort By: Best Rating</option>
                                                <option>Sort By: Lowest Price</option>
                                                <option>Sort By: Highest Price</option>
                                            </select></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="shop-p__collection">
                            <div class="row is-grid-active">
                                @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product-m">
                                        <div class="product-m__thumb">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                <img class="aspect__img" src="images/product/{{$product->image}}" alt=""></a>
                                            <div class="product-m__quick-look">

                                                <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                            <div class="product-m__add-cart">

                                                <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</a></div>
                                        </div>
                                        <div class="product-m__content">
                                            <div class="product-m__category">

                                                <a href="shop-side-version-2.html">Electric</a></div>
                                            <div class="product-m__name">

                                                <a href="product-detail.html">{{$product->name}}</a></div>
                                            <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span class="product-m__review">(23)</span></div>
                                            <div class="product-m__price">{{number_format($product->unit_price)}} đ</div>
                                            <div class="product-m__hover">
                                                <div class="product-m__preview-description">

                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></div>
                                                <div class="product-m__wishlist">

                                                    <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="u-s-p-y-60">

                            <!--====== Pagination ======-->
                            {{ $products->links('pagination.default') }}
                            <!--====== End - Pagination ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->
</div>
@endsection()