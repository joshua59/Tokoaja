<x-app-layout title="order">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @if($order != null)
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Product</th>
                                            <th>Jumlah Product</th>
                                            <th>Total Harga</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach($order as $item)
                                        @if($item->id_user == session()->get('user')->id)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td><a href="{{route('detail', $item->id_product)}}">{{$item->id_product}}</a></td>
                                            <td>{{$item->jumlah_product}}</td>
                                            <td>Rp.{{number_format($item->total_harga)}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                @if($item->status == 'Dibatalkan' || $item->status == 'Ditolak')
                                                <a>Orderan Telah Dibatalkan/Ditolak</a>
                                                @else
                                                <a href="{{route('order.delete', $item->id)}}" class="btn btn-sm btn-danger">Cancel</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>  
                            @else
                            Maaf Server Order Sedang Down 
                            @endif          
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>