<x-app-layout title="profile">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container">
                    <div class="row">
                        <form action="{{route('profileupdate')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 text-left">
                                    <label style="font-size: 13px;" class="font-weight-bold">Nama</label>
                                    <input type="text" name="nama" id="" class="form-control"value="{{ $user->nama }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 text-left">
                                    <label style="font-size: 13px;" class="font-weight-bold">Alamat</label>
                                    <input type="text" name="alamat" id="" class="form-control"value="{{ $user->alamat }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 text-left">
                                    <label style="font-size: 13px;" class="font-weight-bold">Email</label>
                                    <input type="text" name="email" id="" class="form-control"value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 text-left">
                                    <label style="font-size: 13px;" class="font-weight-bold">Password</label>
                                    <input type="text" name="password" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 text-left">
                                    <label style="font-size: 13px;" class="font-weight-bold">Nomor Hp</label>
                                    <input type="text" name="nomor_hp" id="" class="form-control"value="{{ $user->nomor_hp }}">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Update" class="btn btn-sm btn-info mt-4">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>