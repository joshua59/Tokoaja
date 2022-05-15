<x-app-layout title="detail">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container clearfix">
                    <div class="single-product">
						<div class="product">
							<div class="row gutter-40">

                                <div class="col-md-6">
									<!-- Product Single - Gallery
									============================================= -->
									<div class="product-image">
										<div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
											<div class="flexslider">
												<div class="slider-wrap" data-lightbox="gallery">
													<div class="slide" data-thumb="http://192.168.100.8:8081/images/{{$product->gambar}}"><a href="http://192.168.100.8:8081/images/{{$product->gambar}}" title="{{$product->nama}}" data-lightbox="gallery-item"><img src="http://192.168.100.8:8081/images/{{$product->gambar}}" alt="Pink Printed Dress"></a></div>
													{{-- <div class="slide" data-thumb="images/shop/thumbs/dress/3-1.jpg"><a href="images/shop/dress/3-1.jpg" title="Pink Printed Dress - Side View" data-lightbox="gallery-item"><img src="http://192.168.100.8:8081/images/{{$product->gambar}}" alt="Pink Printed Dress"></a></div>
													<div class="slide" data-thumb="images/shop/thumbs/dress/3-2.jpg"><a href="images/shop/dress/3-2.jpg" title="Pink Printed Dress - Back View" data-lightbox="gallery-item"><img src="http://192.168.100.8:8081/images/{{$product->gambar}}" alt="Pink Printed Dress"></a></div> --}}
												</div>
											</div>
										</div>
										<div class="sale-flash badge bg-success p-2">Dijual!</div>
									</div><!-- Product Single - Gallery End -->

								</div>

								<div class="col-md-6 product-desc">
                                    <h3>{{$product->nama}}</h3>
									<div class="d-flex align-items-center justify-content-between">

										<!-- Product Single - Price
										============================================= -->
										<div class="product-price"><ins>Rp. {{number_format($product->harga)}}</ins></div><!-- Product Single - Price End -->

										<!-- Product Single - Rating
										============================================= -->
										<div class="d-flex align-items-center">

                                            <!-- Product Single - Rating End -->
											{{-- <button type="button" class="btn btn-sm btn-secondary ms-3"><i class="icon-heart"></i></button> --}}
										</div>

									</div>

									<div class="line"></div>

									<!-- Product Single - Quantity & Cart Button
									============================================= -->
									<form class="cart mb-0 d-flex justify-content-between align-items-center" method="post" enctype='multipart/form-data'>
										<div class="quantity clearfix">
											<input type="button" value="-" class="minus">
											<input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" />
											<input type="button" value="+" class="plus">
										</div>
										<button type="submit" class="add-to-cart button m-0">Order</button>
									</form><!-- Product Single - Quantity & Cart Button End -->

									<div class="line"></div>

									<!-- Product Single - Short Description
									============================================= -->
									<p>{!!$product->deskripsi!!}</p>

									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex justify-content-between align-items-center px-0">
											<span class="text-muted">Stok:</span><span class="text-dark fw-semibold">{{$product->stok}}</span>
										</li>
									</ul>

									<!-- Product Single - Share
									============================================= -->
									{{-- <div class="si-share d-flex justify-content-between align-items-center mt-4">
										<span>Share:</span>
										<div>
											<a href="#" class="social-icon si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-gplus">
												<i class="icon-gplus"></i>
												<i class="icon-gplus"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-rss">
												<i class="icon-rss"></i>
												<i class="icon-rss"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-email3">
												<i class="icon-email3"></i>
												<i class="icon-email3"></i>
											</a>
										</div>
									</div> --}}
                                    <!-- Product Single - Share End -->

								</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>