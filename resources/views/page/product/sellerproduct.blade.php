<x-app-layout title="sellerproduct">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h3>Daftar Produk Saya</h3>
                        </div>
                        <div class="col-6" align="right">
                            <a href="{{route('product.create')}}" class="btn btn-sm btn-info mt-4">Tambah Produk</a>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div id="shop" class="shop row grid-container gutter-30 mb-5" data-layout="fitRows"> --}}
                            @foreach($product as $item)
                            <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="javascript:void(0);"><img src="http://192.168.100.8:8081/images/{{$item->gambar}}" height="250px" alt="{{$item->nama}}"></a>
                                        <div class="sale-flash badge badge-success p-2">Dijual</div>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                                                <a href="javascript:void(0);" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
                                                <a href="{{route('detail', $item->id)}}" class="btn btn-sm btn-primary">Detail</a>
                                                {{-- <a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a> --}}
                                            </div>
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="{{route('detail', $item->id)}}">{{$item->nama}}</a></h3></div>
                                        <div class="product-price"><ins>Rp. {{number_format($item->harga)}}</ins></div>
                                        <div class="product-description">
                                            <a href="{{route ('product.delete', $item->id)}}" style="color:red;float:right;" class="ml-2"><i class="icon-line-trash"></i></a>
                                            <a href="{{route ('product.edit', $item->id)}}" style="color:yellowgreen;float:right;"><i class="icon-line-edit"></i></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>



