            <!-- ===================== Dashboard Sidebar Start ======================= -->

            <div class="dashboard-sidebar">
                <button type="button" class="dashboard-sidebar__close d-lg-none d-flex"><i
                        class="las la-times"></i></button>
                <div class="dashboard-sidebar__inner">

                    {{-- <a href="{{ route('home') }}" class="logo logo_icon favicon mb-48">
                        <img src="assets/images/thumbs/dashboard_sidebar_icon.png" alt="logo with text">
                    </a> --}}

                    <!-- Sidebar List Start -->
                    <ul class="sidebar-list">
                        {{-- logo & title --}}
                        <li class="w-100">
                            <a href="{{ route('home') }}"
                                class="d-flex justify-content-center align-items-center gap-3 logo mb-48">
                                <img src="{{ asset('assets/frontend/images/logo/logo_with_text.png') }}"
                                    alt="logo with text" class="white-version" width="50px">
                                <h3 id="sidbarTitle" class="pt-3" style="color: #213f88"><span
                                        style="color: #f69221">S</span>ewa<span style="color: #f69221">G</span>anj</h3>
                            </a>
                        </li>

                        {{-- home --}}
                        <li class="sidebar-list__item">
                            <a href="{{ route('home') }}" class="sidebar-list__link">
                                <span class="sidebar-list__icon">
                                    <i class="ti ti-list"></i>
                                </span>
                                <span class="text">{{ __('Home') }}</span>
                            </a>
                        </li>

                        {{-- dashboard --}}
                        <li class="sidebar-list__item">
                            <a href="{{ route('dashboard') }}" class="sidebar-list__link">
                                <span class="sidebar-list__icon">
                                    <i class="ti ti-device-heart-monitor"></i>
                                </span>
                                <span class="text">{{ __('Dashboard') }}</span>
                            </a>
                        </li>

                        {{-- profile --}}
                        <li class="sidebar-list__item">
                            <a href="{{ route('profile') }}" class="sidebar-list__link">
                                <span class="sidebar-list__icon">
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="text">{{ __('Profile') }}</span>
                            </a>
                        </li>

                        {{-- your services --}}
                        @if (Auth::user()->user_type === 'vendor')
                            <li class="sidebar-list__item">
                                <a href="{{ route('vendor-services.index', Auth::user()->id) }}"
                                    class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <i class="ti ti-list-details"></i>
                                    </span>
                                    <span class="text">{{ __('Your Services') }}</span>
                                </a>
                            </li>
                        @endif

                        {{-- cart items --}}
                        @if (Auth::user()->user_type === 'customer')
                            <li class="sidebar-list__item">
                                <a href="{{ route('cart-items.index') }}" class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            style = "
                                            display: inline-block !important;
                                            opacity: 1 !important;
                                            visibility: visible !important;
                                            stroke: currentColor !important; /* in case stroke color changes on hover */
                                            }"
                                            class="icon icon-tabler icon-tabler-shopping-cart" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="6" cy="19" r="2" />
                                            <circle cx="17" cy="19" r="2" />
                                            <path d="M17 17h-11v-14h-2" />
                                            <path d="M6 5l14 1l-1 7h-13" />
                                        </svg>

                                    </span>
                                    <span class="text">{{ __('Your Cart') }}</span>
                                </a>
                            </li>
                        @endif

                        

                        {{-- <li class="sidebar-list__item">
                            <a href="setting" class="sidebar-list__link">
                                <span class="sidebar-list__icon">
                                    <i class="ti ti-settings"></i>
                                </span>
                                <span class="text">{{ __('Settings') }}</span>
                            </a>
                        </li> --}}





                        {{-- logout option --}}
                        <li class="sidebar-list__item">
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                @csrf
                                <a href="" class="sidebar-list__link"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <span class="sidebar-list__icon">
                                        <i class="ti ti-logout"></i>
                                    </span>
                                    <span class="text">{{ __('Logout') }}</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- Sidebar List End -->

                </div>
            </div>
