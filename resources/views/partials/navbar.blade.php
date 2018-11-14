<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container-fluid px-4">
        
        <a class="navbar-brand" href="{{ url('/') }}" >
            {{-- app logo --}}
            @if (config('blogged.ui.logo'))
                <img src="{{ asset(config('blogged.ui.logo')) }}" alt="{{ config('app.name')}} logo"/>
            @else
                <svg fill="#fff" height="30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1024 1024"><defs><clipPath id="a"><rect class="a" width="1024" height="1024"/></clipPath></defs><g class="b"><g transform="translate(1204.192 -4.201) rotate(90)"><path class="a" d="M493.906,727.422H439.658a222,222,0,0,1-38.836-3.005c-11.045-1.994-20.378-5.028-27.741-9.016s-12.963-9.044-16.645-15.026a39.5,39.5,0,0,1-5.548-21.036V413.029a84.1,84.1,0,0,1,2.235-20.5,40.364,40.364,0,0,1,6.7-14.641A28.011,28.011,0,0,1,371,369.1a38.983,38.983,0,0,1,15.642-2.928h44.385c39.269,0,75.358,2.281,107.265,6.781a266.267,266.267,0,0,1,44.54,10.017,192,192,0,0,1,37.45,16.491,130.734,130.734,0,0,1,29.9,23.734,134.7,134.7,0,0,1,21.885,31.747c5.931,11.864,10.442,25.76,13.408,41.3a282.048,282.048,0,0,1,4.47,52.4,261.438,261.438,0,0,1-3.7,45.463,168.3,168.3,0,0,1-11.1,37.759,156.261,156.261,0,0,1-17.722,30.822,138.233,138.233,0,0,1-23.58,24.659,153.781,153.781,0,0,1-28.819,18.494,173.329,173.329,0,0,1-33.443,12.33C547.853,724.311,521.72,727.422,493.906,727.422Zm-304.684-6.648h0a119.737,119.737,0,0,1-20.244-26.82L15.015,416.235a119.876,119.876,0,0,1,2.092-119.8L180.668,24.23A120.213,120.213,0,0,1,192.847,7.445,77.42,77.42,0,0,1,209.129,19.76a67.156,67.156,0,0,1,11.629,15.6c6.173,11.445,9.3,25.265,9.3,41.077V663.31a67.057,67.057,0,0,1-2.552,18.881,53.193,53.193,0,0,1-7.657,15.871,57.759,57.759,0,0,1-12.762,12.861,82.2,82.2,0,0,1-17.866,9.851ZM817.593,497.44v-.007a162.075,162.075,0,0,0-57.375-99.2,247.66,247.66,0,0,0-32.672-23.04,285.755,285.755,0,0,0-37.6-18.571,348.441,348.441,0,0,0-42.535-14.1,439.825,439.825,0,0,0-47.467-9.632v-4.931a627.877,627.877,0,0,0,68.425-27.126c20.863-9.816,39.115-22.052,54.249-36.369a149.339,149.339,0,0,0,35.139-50.551,145.448,145.448,0,0,0,8.836-29.666,209.248,209.248,0,0,0,3.442-34.793l89.612,161.684a119.749,119.749,0,0,1-2.092,119.8l-39.955,66.5ZM386.642,318.093A51.4,51.4,0,0,1,371,315.936a28.382,28.382,0,0,1-11.173-6.473,27.048,27.048,0,0,1-6.7-10.788,46.508,46.508,0,0,1-2.235-15.1V45.618a36.783,36.783,0,0,1,5.394-19.957c3.579-5.676,9.024-10.472,16.182-14.255s16.233-6.662,26.97-8.553A221.059,221.059,0,0,1,437.192,0h48.083A273.4,273.4,0,0,1,523.13,2.485,190.871,190.871,0,0,1,555.937,9.94,141.192,141.192,0,0,1,583.7,22.366a117.667,117.667,0,0,1,22.713,17.4,116.324,116.324,0,0,1,17.665,22.366A136.987,136.987,0,0,1,636.7,89.468a183.135,183.135,0,0,1,7.571,32.307,261.173,261.173,0,0,1,2.524,37.277c0,28.631-2.9,53.312-8.631,73.358a85.661,85.661,0,0,1-13.408,27.432,95.89,95.89,0,0,1-22.964,21.884c-9.2,6.341-20.506,11.889-33.6,16.491a276.6,276.6,0,0,1-45.31,11.25C488.923,315.189,443.086,318.093,386.642,318.093Z" transform="translate(78.715 328.112)"/></g></g></svg>
            @endif
            {{-- /app logo --}}
    
            @if (config('blogged.ui.show_app_name'))
                <span>{{ config('app.name') }}</span>
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="/">
                            {{ config('app.name') }}
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="/">
                        <i class="ni ni-planet"></i>
                        <span class="nav-link-inner--text">Home</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="/blog">
                        <i class="ni ni-book-bookmark"></i>
                        <span class="nav-link-inner--text">Blog</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="/blog/dashboard">
                        <i class="ni ni-palette"></i>
                        <span class="nav-link-inner--text">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>