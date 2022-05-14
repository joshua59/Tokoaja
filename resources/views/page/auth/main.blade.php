<x-auth-layout>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form id="form_login" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="Email" name="email" id="email_login" data-login="1"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" id="password_login" data-login="2"/>
                    </div>
                    <button id="tombol_login" onclick="auth('#tombol_login','#form_login','login','Login');" type="button" class="btn solid" data-login="3">Login</button>
                    {{-- <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div> --}}
                    <br>
                </form>
                <form id="form_register" class="sign-up-form">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama" name="nama" id="nama_register" data-register="1" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-home"></i>
                        <input type="text" placeholder="Alamat" name="alamat" id="alamat_register" data-register="2" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" id="email_register" data-register="3" />
                    </div>
                    <!-- <div class="input-field">
                        <i class="fas fa-marker"></i>
                        <input type="text" placeholder="Alamat" name="alamat" id="alamat_register" data-register="3" />
                    </div> -->
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="tel" placeholder="Nomor Hp" name="nomor_hp" id="phone_register" data-register="4" maxlength="14"/>
                    </div>

                    <!-- <select name="jenis_kelamin" class="input-field">
                        <option selected disabled>Jenis Kelamin</option>
                        <option value="laki-laki">Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select> -->

                    {{-- <select name="role" class="input-field">
                        <i class="fas fa-marker"></i>
                        <option type="text" selected disabled>Role</option>
                        <option value="petani">Petani</option>
                        <option value="mu">Masyarakat Umum</option>
                    </select> --}}

                    <!-- <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" id="username_register" data-register="1">
                    </div> -->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" id="password_register" data-register="5" />
                    </div>

                        <input type="hidden" name="role" id="role_register" value="customer" data-register="6" />

                    <button id="tombol_register" onclick="auth('#tombol_register','#form_register','register','Sign Up');" type="button" class="btn" data-register="5">Sign Up</button>
                    {{-- <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="javascript:void(0);" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3 style="margin-top:30px;">
                        Belum memiliki akun ?
                        <a href="javascript:void(0);" id="sign-up-btn" style="color:white;text-decoration: none;"> Register sekarang</a>
                    </h3>
                </div>
                <img src="{{asset('images/whitelogo.png')}}" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3 style="margin-top:30px;">
                        Sudah memiliki akun ?
                        <a href="javascript:void(0);" id="sign-in-btn" style="color:white;text-decoration: none;"> Login</a>
                    </h3>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>
                <img src="{{asset('images/blacklogo.png')}}" class="image" alt="" />
            </div>
        </div>
    </div>
</x-auth-layout>