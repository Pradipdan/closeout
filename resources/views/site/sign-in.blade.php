@extends('../layouts.site')

@section('content')
    @include('../layouts.site.css-sign-in')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Register basic -->
                        <div class="card mb-0 sign_card">
                            <div class="card-body">
                                {{-- <a href="index.html" class="brand-logo">
                                    <img src="{{ asset('./site/sign-in/images/logo_fav.jpg') }}" alt="">
                                </a>

                                <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
                                <p class="card-text mb-2">Make your app management easy and fun!</p> --}}

                                <form class="auth-register-form mt-3" action="{{ route('site.user_add') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                placeholder="john" aria-describedby="first_name" tabindex="1" autofocus />
                                            @error('first_name')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="doe" aria-describedby="last_name" tabindex="1" autofocus />
                                            @error('last_name')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" mt-3">
                                        <label for="phone_no" class="form-label">Phone No</label>
                                        <input type="text" class="form-control" id="phone_no" name="phone_no"
                                            placeholder="Phone No" aria-describedby="phone_no" tabindex="1" autofocus />
                                        @error('phone_no')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" mt-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="john@example.com" aria-describedby="email" tabindex="2" />
                                        @error('email')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class=" mt-3">
                                        <label for="password" class="form-label">Password</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" tabindex="3" />
                                            <span class="input-group-text cursor-pointer password_toggle"><i
                                                    class="bi bi-eye-fill"></i></span>

                                        </div>
                                        @error('password')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" mt-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge"
                                                id="confirm_password" name="confirm_password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="confirm_password" tabindex="3" />
                                            <span class="input-group-text cursor-pointer confirm_password_toggle"><i
                                                    class="bi bi-eye-fill"></i></span>

                                        </div>
                                        @error('confirm_password')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="my-2 py-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="register-privacy-policy"
                                                tabindex="4" required />
                                            <label class="form-check-label" for="register-privacy-policy">
                                                I agree to <a href="#">privacy policy & terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn sign_in_btn w-100" tabindex="5">Sign up</button>
                                </form>

                                <p class="text-center mt-3">
                                    <span>Already have an account?</span>
                                    <a href="/site-login">
                                        <span>Log-in instead</span>
                                    </a>
                                </p>

                                {{-- <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div> --}}

                                {{-- <div class="auth-footer-btn d-flex justify-content-center">
                                    <a href="#" class="btn btn-facebook">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-twitter white">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-google">
                                        <i data-feather="mail"></i>
                                    </a>
                                    <a href="#" class="btn btn-github">
                                        <i data-feather="github"></i>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <!-- /Register basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
