<x-app-layout title="profile">
    <div id="content_list">
        <section id="content">
            <div class="content-wrap bg-light">
                <div class="container">
                    <div class="row">
                        <table>
                            <tr>
                                <th width="150px">Nama</th>
                                <td>{{$user->nama}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$user->alamat}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Nomor Hp</th>
                                <td>{{$user->nomor_hp}}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{$user->role}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <a href="{{route('profileedit')}}" class="btn btn-sm btn-info mt-4">Edit</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
</x-app-layout>