<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Q Camera</title>
	<base href="{{asset('')}}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="config">
	<div class="preloader is-active">
		<div class="preloader__wrap">

			<img class="preloader__img" src="images/preloader.png" alt=""></div>
	</div>

	<!--====== Main App ======-->
	<div id="app">

		<!--====== Main Header ======-->
		@include('header')
		<!--====== End - Main Header ======-->


		<!--====== App Content ======-->
		@yield('content')
		<!--====== End - App Content ======-->


		<!--====== Main Footer ======-->
		@include('footer')
		<!--====== Modal Section ======-->


		<!--====== Quick Look Modal ======-->
		<div class="modal fade" id="quick-look">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content modal--shadow">

					<button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-5">

								<!--====== Product Breadcrumb ======-->
								<div class="pd-breadcrumb u-s-m-b-30">
									<ul class="pd-breadcrumb__list">
										<li class="has-separator">

											<a href="index.hml">Home</a></li>
										<li class="has-separator">

											<a href="shop-side-version-2.html">Electronics</a></li>
										<li class="has-separator">

											<a href="shop-side-version-2.html">DSLR Cameras</a></li>
										<li class="is-marked">

											<a href="shop-side-version-2.html">Nikon Cameras</a></li>
									</ul>
								</div>
								<!--====== End - Product Breadcrumb ======-->


								<!--====== Product Detail ======-->
								<div class="pd u-s-m-b-30">
									<div class="pd-wrap">
										<div id="js-product-detail-modal">
											<div>

												<img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
										</div>
									</div>
									<div class="u-s-m-t-15">
										<div id="js-product-detail-modal-thumbnail">
											<div>

												<img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
											<div>

												<img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
										</div>
									</div>
								</div>
								<!--====== End - Product Detail ======-->
							</div>
							<div class="col-lg-7">

								<!--====== Product Right Side Details ======-->
								<div class="pd-detail">
									<div>

										<span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span></div>
									<div>
										<div class="pd-detail__inline">

											<span class="pd-detail__price">$6.99</span>

											<span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del></div>
									</div>
									<div class="u-s-m-b-15">
										<div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

											<span class="pd-detail__review u-s-m-l-4">

												<a href="product-detail.html">23 Reviews</a></span></div>
									</div>
									<div class="u-s-m-b-15">
										<div class="pd-detail__inline">

											<span class="pd-detail__stock">200 in stock</span>

											<span class="pd-detail__left">Only 2 left</span></div>
									</div>
									<div class="u-s-m-b-15">

										<span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></div>
									<div class="u-s-m-b-15">
										<div class="pd-detail__inline">

											<span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

												<a href="signin.html">Add to Wishlist</a>

												<span class="pd-detail__click-count">(222)</span></span></div>
									</div>
									<div class="u-s-m-b-15">
										<div class="pd-detail__inline">

											<span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

												<a href="signin.html">Email me When the price drops</a>

												<span class="pd-detail__click-count">(20)</span></span></div>
									</div>
									<div class="u-s-m-b-15">
										<ul class="pd-social-list">
											<li>

												<a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
											<li>

												<a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
											<li>

												<a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
											<li>

												<a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a></li>
											<li>

												<a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
										</ul>
									</div>
									<div class="u-s-m-b-15">
										<form class="pd-detail__form">
											<div class="pd-detail-inline-2">
												<div class="u-s-m-b-15">

													<!--====== Input Counter ======-->
													<div class="input-counter">

														<span class="input-counter__minus fas fa-minus"></span>

														<input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

														<span class="input-counter__plus fas fa-plus"></span></div>
													<!--====== End - Input Counter ======-->
												</div>
												<div class="u-s-m-b-15">

													<button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button></div>
											</div>
										</form>
									</div>
									<div class="u-s-m-b-15">

										<span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
										<ul class="pd-detail__policy-list">
											<li><i class="fas fa-check-circle u-s-m-r-8"></i>

												<span>Buyer Protection.</span></li>
											<li><i class="fas fa-check-circle u-s-m-r-8"></i>

												<span>Full Refund if you don't receive your order.</span></li>
											<li><i class="fas fa-check-circle u-s-m-r-8"></i>

												<span>Returns accepted if product not as described.</span></li>
										</ul>
									</div>
								</div>
								<!--====== End - Product Right Side Details ======-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Quick Look Modal ======-->


		<!--====== Add to Cart Modal ======-->
		<div class="modal fade" id="add-to-cart">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content modal-radius modal-shadow">

					<button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="success u-s-m-b-30">
									<div class="success__text-wrap"><i class="fas fa-check"></i>

										<span>Item is added successfully!</span></div>
									{{-- <div class="success__img-wrap">

										<img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt="">
									</div>
									<div class="success__info-wrap">

										<span class="success__name">Beats Bomb Wireless Headphone</span>

										<span class="success__quantity">Quantity: <span>1</span></span>

										<span class="success__price">$170.00</span>
									</div> --}}
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="s-option">

									<span class="s-option__text"><span>1</span> item (s) in your cart</span>
									<div class="s-option__link-box">

										<a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>

										<a class="s-option__link btn--e-white-brand-shadow" href="/cart">VIEW CART</a>

										<a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO CHECKOUT</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Add to Cart Modal ======-->

		<!--====== End - Modal Section ======-->
	</div>
	<!--====== End - Main App ======-->


	<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
	<script>
		window.ga = function() {
			ga.q.push(arguments)
		};
		ga.q = [];
		ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('send', 'pageview')
	</script>
	<script src="https://www.google-analytics.com/analytics.js" async defer></script>

	<!--====== Vendor Js ======-->
	<script src="js/vendor.js"></script>

	<!--====== jQuery Shopnav plugin ======-->
	<script src="js/jquery.shopnav.js"></script>

	<!--====== App ======-->
	<script src="js/app.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
	<!--====== Noscript ======-->
	<noscript>
		<div class="app-setting">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="app-setting__wrap">
							<h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

							<span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</noscript>

	<script>
	$(document).on("click",".submit-cart",function(event) {
	//$('.submit-cart').click(function(){
		event.preventDefault();
		// var productId = $(this).parent().find("input[name='ProductId']").val();
		var productId = $(this).data('id');
		$.ajax ({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
    		type: 'post',
    		dataType: 'html',
   			url: '<?php echo url('/cart/add');?>/'+productId, 
    		success: 
        		function (data) {
        			var result = ''; 
        			var total = 0;
        			var totalQty = 0;
        			var cart = '';
        			var obj = jQuery.parseJSON(data);
        			var strText = "";
        			$.each( obj, function( key, value ) {
        				total += (value.qty*value.price);
        				totalQty += parseInt(value.qty);
        				console.log(value); 
						result += `<div class="card-mini-product">
							<div class="mini-product">
								<div class="mini-product__image-wrapper">

									<a class="mini-product__link" href="product-detail.html">

										<img class="u-img-fluid" src="images/product/`+value.options.cat_slug+`/`+value.options.img+`" alt=""></a></div>
								<div class="mini-product__info-wrapper">

									<span class="mini-product__category">

										<a href="shop-side-version-2.html">Electronics</a></span>

									<span class="mini-product__name">

										<a href="product-detail.html">`+ value.name + `</a></span>

									<span class="mini-product__quantity">`+value.qty+` x</span>

									<span class="mini-product__price">`+numeral(value.price).format('0,0')+` đ</span></div>
							</div>

							<a class="mini-product__delete-link far fa-trash-alt deleteCart" data-id="`+value.rowId+`"></a>
						</div>`;
					   	// result += "<div class='cart-item'>" +
		                // 		"<div class='media'>" + 
		                // 		"<a class='pull-left' href='#''><img src='source/image/product/"+value.options.img+"' alt='' ></a>"+			             
		                // 		"<div class='media-body'>"+
		                //     	"<input type='hidden' value='"+value.rowId+"' id='rowId'>"+
		                //     	"<a ><button type='button' class='remove-cart-item deleteCart'>×</button></a>"+
		                //     	"<span class='cart-item-title'>"+ value.name + "</span>"+
		                // 		"<span class='cart-item-amount'>"+value.qty+"*<span>"+numeral(value.price).format('0,0')+"</span></span>"+
	                	// 		"</div>"+
	                	// 	"</div>"+
	                	// 	"</div>";
					});
					// result+= "<div class='cart-caption' id='updateCart' >"+
					// 		"<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>"+numeral(total).format('0,0')+"</span></div>"+
					// 		"<div class='clearfix'></div>"+

					// 		"<div class='center'>"+
					// 			"<div class='space10'>&nbsp;</div>"+
					// 			"<a href='{{url('cart')}}' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>"+
					// 		"</div>"+
					// 	"</div>";

					$(".s-option__text > span").text(totalQty);
		            if(totalQty>0 ) {
		                strText = totalQty;
		                $('div#block').css({'display':'block'});
		            }
		            else {
		                strText = "Trống";
		            }
					$(".mini-product-container .card-mini-product").remove();
					$(".mini-product-container").html(result);
		            // cart+= "<i class='fa fa-shopping-cart'></i> Giỏ hàng "+
					// 		"( "+ strText +" )" +
					// 		"<i class='fa fa-chevron-down'></i>"
	        		// console.log(cart);
					$(".mini-product-stat .subtotal-value").text(numeral(total).format('0,0'));
	        		// $('.beta-select').html(cart);
             		// $('#add-cart-item').html(result);
             	},
		});
	});

	$(document).on("click",".deleteCart",function(event){
		// var rowId = $(this).parent().parent().find('#rowId').val();
		var rowId = $(this).data('id');
		event.preventDefault();
		$.ajax ({
        	type: 'get',
        	dataType: 'html',
       		url: '<?php echo url('/cart/delete');?>/'+rowId,
        	success: 
    			function (data) {
    				var result = ''; 
        			var total = 0;
        			var totalQty = 0;
        			var cart = '';
        			var obj = jQuery.parseJSON(data);
        			var strText = "";
        			$.each( obj, function( key, value ) {
        				total += (value.qty*value.price);
        				totalQty += parseInt(value.qty);
        				console.log(value); 
						result += `<div class="card-mini-product">
							<div class="mini-product">
								<div class="mini-product__image-wrapper">

									<a class="mini-product__link" href="product-detail.html">

										<img class="u-img-fluid" src="images/product/`+value.options.cat_slug+`/`+value.options.img+`" alt=""></a></div>
								<div class="mini-product__info-wrapper">

									<span class="mini-product__category">

										<a href="shop-side-version-2.html">Electronics</a></span>

									<span class="mini-product__name">

										<a href="product-detail.html">`+ value.name + `</a></span>

									<span class="mini-product__quantity">`+value.qty+` x</span>

									<span class="mini-product__price">`+numeral(value.price).format('0,0')+` đ</span></div>
							</div>

							<a class="mini-product__delete-link far fa-trash-alt deleteCart" data-id="`+value.rowId+`"></a>
						</div>`;
					   	// result += "<div class='cart-item'>" +
		                // 		"<div class='media'>" + 
		                // 		"<a class='pull-left' href='#''><img src='source/image/product/"+value.options.img+"' alt='' ></a>"+			             
		                // 		"<div class='media-body'>"+
		                //     	"<input type='hidden' value='"+value.rowId+"' id='rowId'>"+
		                //     	"<a ><button type='button' class='remove-cart-item deleteCart'>×</button></a>"+
		                //     	"<span class='cart-item-title'>"+ value.name + "</span>"+
		                // 		"<span class='cart-item-amount'>"+value.qty+"*<span>"+numeral(value.price).format('0,0')+"</span></span>"+
	                	// 		"</div>"+
	                	// 	"</div>"+
	                	// 	"</div>";
					});
					// result+= "<div class='cart-caption' id='updateCart' >"+
					// 		"<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>"+numeral(total).format('0,0')+"</span></div>"+
					// 		"<div class='clearfix'></div>"+

					// 		"<div class='center'>"+
					// 			"<div class='space10'>&nbsp;</div>"+
					// 			"<a href='{{url('cart')}}' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>"+
					// 		"</div>"+
					// 	"</div>";

					$(".s-option__text > span").text(totalQty);
		            if(totalQty>0 ) {
		                strText = totalQty;
		                $('div#block').css({'display':'block'});
		            }
		            else {
		                strText = "Trống";
		            }
					$(".mini-product-container .card-mini-product").remove();
					$(".mini-product-container").html(result);
		            // cart+= "<i class='fa fa-shopping-cart'></i> Giỏ hàng "+
					// 		"( "+ strText +" )" +
					// 		"<i class='fa fa-chevron-down'></i>"
	        		// console.log(cart);
					$(".mini-product-stat .subtotal-value").text(numeral(total).format('0,0'));
	        		// $('.beta-select').html(cart);
             		// $('#add-cart-item').html(result);
	            },
	            error: function (request, status, error) {
				        // alert(request.responseText);
				}
		});
	});
	</script>
</body>
</html>
