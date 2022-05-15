<x-app-layout title="home">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container">
                    <div class="row">
                        @if($product != null)
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
                                            {{-- @if (Auth::user()->id == $item->id_penjual)
                                            <a onclick="handle_delete('{{$item->id}}','product/{{$item->id}}/delete');" href="javascript:void(0);" style="color:red;float:right;" class="ml-2"><i class="icon-line-trash"></i></a>
                                            <a onclick="handle_open_modal('{{$item->id}}','product/{{$item->id}}/edit','#MUbahProduk','#contentUbahProduk');" href="javascript:void(0);" style="color:yellowgreen;float:right;"><i class="icon-line-edit"></i></a>
                                            @endif --}}
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        {{-- </div> --}}
                        @else
                        Maaf Server Product Sedang Down
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>



