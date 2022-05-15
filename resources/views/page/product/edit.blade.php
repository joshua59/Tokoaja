<x-app-layout title="sellerproduct">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
            
                            <h4 align="right"> <a href="{{ route('sellerproduct') }}" class="btn btn-outline-primary">Kembali</a> </h4>
                            <div class="card-header">
                                <h4 class="mb-0">Form Penambahan Product </h4> 
                            </div>
                            <form action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga Product" value="{{$product->harga}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" name="stok" class="form-control" placeholder="Masukkan Stok Product" value="{{$product->stok}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea id="summernote" class="form-control" name="deskripsi" style="white-space: pre-line;" required>
                                        {{$product->deskripsi}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>