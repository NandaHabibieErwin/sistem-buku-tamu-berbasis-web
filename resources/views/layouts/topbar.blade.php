<header id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo-light-sm.png') }}" alt="" height="26">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="bx bx-menu align-middle"></i>
            </button>

            <!-- start page title -->
            <div class="page-title-box align-self-center d-none d-md-block">
                <h4 class="page-title mb-0">@yield('page-title')</h4>
            </div>
            <!-- end page title -->

        </div>
        @auth
            <div class="d-flex">

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown-v"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-bell icon-sm align-middle"></i>
                        @if ($count > 0)
                            <span id="notifa" class="noti-dot bg-danger rounded-pill">{{ $count }}</span>
                        @endif
                    </button>

                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown-v">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-0 font-size-15"> Notifications </h5>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript:void(0);" id="read"
                                        class="small fw-semibold text-decoration-underline"> Mark all as read</a>
                                </div>
                            </div>
                        </div>
                        @forelse ($notif as $hourlyGroup)
                            <div data-simplebar style="max-height: 250px;">

                                @php
                                    $notificationsCount = count($hourlyGroup);
                                    $latestNotification = $hourlyGroup->first(); // Get the latest notification in the group
                                @endphp

                                @if ($notificationsCount > 1)
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <i class='fas fa-portrait rounded-circle avatar-sm' style='font-size:36px'></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted font-size-13 mb-0 float-end">
                                                    @php
                                                        $createdAt = $latestNotification->created_at;
                                                        $diff = now()->diffInDays($createdAt);
                                                        $diffText = $diff === 1 ? 'kemarin' : $createdAt->diffForHumans();
                                                    @endphp
                                                    {{ $diffText }}
                                                </p>
                                                <h6 class="mb-1">
                                                    {{ \Carbon\Carbon::parse($hourlyGroup[0]->created_at)->format('H:00') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($hourlyGroup[0]->created_at)->addHour()->format('H:00') }}
                                                </h6>
                                                <div>
                                                    <p class="mb-0">Ada {{ $notificationsCount }} tamu yang ingin
                                                        berkunjung</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    @foreach ($hourlyGroup as $notification)
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <i class='fas fa-portrait rounded-circle avatar-sm' style='font-size:36px'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted font-size-13 mb-0 float-end">
                                                        @php
                                                            $createdAt = $notification->created_at;
                                                            $diff = now()->diffInDays($createdAt);
                                                            $diffText = $diff === 1 ? 'kemarin' : $createdAt->diffForHumans();
                                                        @endphp
                                                        {{ $diffText }}
                                                    </p>
                                                    <h6 class="mb-1">
                                                        {{ \Carbon\Carbon::parse($hourlyGroup[0]->created_at)->format('H:00') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($hourlyGroup[0]->created_at)->addHour()->format('H:00') }}
                                                    </h6>
                                                    <div>
                                                        <p class="mb-0">{{ $notification->notifPost }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        @empty
                            <p class="mb-0">
                                <center>Tidak Ada Kunjungan</center>
                            </p>
                        @endforelse
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item user text-start d-flex align-items-center"
                        id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='far fa-user-circle rounded-circle header-profile-user' style='font-size:36px'></i>
                        <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <div class="p-3 border-bottom">
                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                            <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->email }}</p>
                            <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->departement->nama_departement }}</p>
                        </div>
                        <a class="dropdown-item" href="javascript:void();"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                                class="align-middle">Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endauth
<script>
    $(document).ready(function() {
        $('#read').click(function(e) {
            e.preventDefault();
            console.log('Clicked Mark All as Read');
            $.ajax({
                url: "{{ route('read') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    $('#notifa').hide();
                },
                error: function(error) {
                    // Handle error response
                    console.error(error);
                }
            });
        });
    });
</script>
