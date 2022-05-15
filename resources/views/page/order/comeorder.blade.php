<x-app-layout title="comeorder">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
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
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td><a href="{{route('detail', $item->id_product)}}">{{$item->id_product}}</a></td>
                                            <td>{{$item->jumlah_product}}</td>
                                            <td>Rp.{{number_format($item->total_harga)}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <form method="POST" action="{{ route('order.update', $item->id) }}">
                                                    @csrf
                                                    <select class="form-select form-select-sm" name="status"
                                                        onchange='if(this.value != 0) { this.form.submit(); }'>
                                                        <option value='0' disabled selected>Status</option>
                                                        <option value='Diproses'>Diproses</option>
                                                        <option value='Dikirim'>Dikirim</option>
                                                        <option value='Selesai'>Selesai</option>
                                                        <option value='Ditolak'>Ditolak</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>