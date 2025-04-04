@extends('layouts.site')

@section('title', 'Account Settings')

@section('content')
    <section id="account" class="account section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <!-- Mobile Menu Toggle -->
            <div class="mobile-menu d-lg-none mb-4">
                <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                    <i class="bi bi-grid"></i>
                    <span>Menu</span>
                </button>
            </div>

            <div class="row g-4">
                @include('site.profile-menu')

                <div class="col-lg-9">
                    <div class="content-area">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel">
                                <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                    <h2>Account Settings</h2>
                                </div>

                                <div class="settings-content">
                                    <!-- Personal Information -->
                                    <div class="settings-section aos-init aos-animate" data-aos="fade-up">
                                        <h3>Personal Information</h3>
                                        <form action="{{ route('account.update') }}" method="POST" class="settings-form" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="profileImage" class="form-label">Profile Image</label>
                                                    <input type="file" class="form-control" id="profileImage" name="profile_image" accept="image/*">
                                                </div>

                                                {{-- <div class="col-md-6">
                                                    <label class="form-label">Current Profile Image</label>
                                                    <br>
                                                    @if ($user->profile_image && Storage::disk('public')->exists($user->profile_image))
                                                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="img-thumbnail" width="100">
                                                    @else
                                                        <p>No Image Available</p>
                                                    @endif
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="firstName"
                                                        name="first_name" value="{{ old('first_name', $user->first_name) }}"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="lastName"
                                                        name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{ old('email', $user->email) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="tel" class="form-control" id="phone"
                                                        name="phone_no" value="{{ old('phone_no', $user->phone_no) }}">
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Security Settings -->
                                    <div class="settings-section aos-init aos-animate" data-aos="fade-up"
                                        data-aos-delay="200">
                                        <h3>Security</h3>
                                        <form action="{{ route('account.updatePassword') }}" method="POST"
                                            class="settings-form">
                                            @csrf
                                            @method('PUT')

                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="currentPassword" class="form-label">Current Password</label>
                                                    <input type="password" class="form-control" id="currentPassword"
                                                        name="current_password" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="newPassword" class="form-label">New Password</label>
                                                    <input type="password" class="form-control" id="newPassword"
                                                        name="new_password" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="confirmPassword"
                                                        name="new_password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Update Password</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Delete Account -->
                                    <div class="settings-section danger-zone aos-init aos-animate" data-aos="fade-up"
                                        data-aos-delay="300">
                                        <h3>Delete Account</h3>
                                        <div class="danger-zone-content">
                                            <p>Once you delete your account, there is no going back. Please be certain.</p>
                                            <form id="delete-account-form" action="{{ route('account.delete') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" id="delete-account-btn" class="btn-danger">Delete
                                                    Account</button>
                                            </form>
                                        </div>
                                    </div>

                                </div> <!-- End settings-content -->
                            </div>
                        </div> <!-- End tab-content -->
                    </div>
                </div> <!-- End col-lg-9 -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('delete-account-btn').addEventListener('click', function(e) {
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, your account cannot be restored!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete my account"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-account-form').submit();
                }
            });
        });
    </script>

@endsection
