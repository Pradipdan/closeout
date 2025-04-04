<div class="col-lg-3">
    <div class="profile-menu collapse d-lg-block" id="profileMenu">
        <!-- User Info -->
        @php
             $user = Auth::user();
        @endphp
        <div class="user-info aos-init aos-animate" data-aos="fade-right">
            <div class="user-avatar">
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile" loading="lazy">
                <span class="status-badge"><i class="bi bi-shield-check"></i></span>
            </div>
            <h4>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h4>
            <div class="user-status">
                <i class="bi bi-award"></i>
                <span>Premium Member</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="menu-nav">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request()->routeIs('order.success') ? 'active' : '' }}"
                        href="{{ route('order.success') }}">
                        <i class="bi bi-box-seam"></i>
                        <span>My Orders</span>
                        <span class="badge">{{ getOrderCount() }}</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request()->routeIs('wishlist.index') ? 'active' : '' }}"
                        href="{{ route('wishlist.index') }}">
                        <i class="bi bi-heart"></i>
                        <span>Wishlist</span>
                        <span class="badge">{{ getWishlistCount() }}</span>
                    </a>
                </li>


                {{-- <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#wallet" aria-selected="false" role="tab"
                        tabindex="-1">
                        <i class="bi bi-wallet2"></i>
                        <span>Payment Methods</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#reviews" aria-selected="false" role="tab"
                        tabindex="-1">
                        <i class="bi bi-star"></i>
                        <span>My Reviews</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request()->routeIs('home.profile') ? 'active' : '' }}"data-bs-toggle="tab"
                        href="{{ route('home.profile') }}">
                        <i class="bi bi-geo-alt"></i>
                        <span>Addresses</span>
                    </a>
                </li> --}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request()->routeIs('home.profile') ? 'active' : '' }}"
                        href="{{ route('home.profile') }}">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
            </ul>

            <div class="menu-footer">
                {{-- <a href="#" class="help-link">
                    <i class="bi bi-question-circle"></i>
                    <span>Help Center</span>
                </a> --}}
                <a href="/logout" class="logout-link">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log Out</span>
                </a>
            </div>
        </nav>
    </div>
</div>
