@extends ('layouts.head')
@section('body')
<body class="g-sidenav-show  bg-gray-100">
  @extends ('layouts.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-3 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard - Home</li>
          </ol>
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
          <a href="javascript:;" class="nav-link text-body p-0">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-body font-weight-bold px-0" role=button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="d-sm-inline d-none">Sign Out</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-6 ms-auto mt-xl-0 mt-4">
                 <div class="row">
                     <div class="col-12">
                         <div class="card bg-gradient-dark">
                             <div class="card-body p-3">
                                 <div class="row">
                                     <div class="col-8 my-auto">
                                         <div class="numbers">
                                             <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Actual Level & Status</p>
                                             <h4 class="text-white font-weight-bolder mb-0">
                                                 Slope Oil Storage
                                             </h4>
                                             <h5 id="dateTimeContainer" class="text-white font-weight-bolder mb-0 opacity-6">
                                                 Tanggal Jam
                                             </h5>
                                             <p id="id_tar016" class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">PT. JX Nippon Oil & Energy Lubricant Indonesia</p>
                                         </div>
                                     </div>
                                     <div class="col-4 text-end">
                                         <img class="w-50" src="../../assets/img/waste.png" alt="image sun">
                                     </div>
                                 </div>
                             </div>
                             <div class="position-relative mt-n5" style="height: 50px;">
                                 <div class="position-absolute w-100">
                                     <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                                         <defs>
                                             <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                                         </defs>
                                         <g class="moving-waves">
                                             <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                                             <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                                             <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                                             <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                                             <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                                             <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                                         </g>
                                     </svg>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 @foreach($update as $data)
                 <div class="row mt-4">
                     <div class="col-md-6">
                         <div class="card">
                             <div class="card-body text-center">
                                 <h1 class="text-gradient text-dark"> <span id="level act"></span> {{ $data->level }} <span class="text-lg ms-n2">mm</span></h1>
                                 <h4 class="mb-0 font-weight-bolder text-dark opacity-7">Oil Level</h4>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6 mt-md-0 mt-4">
                         <div class="card">
                             <div class="card-body text-center">
                                 <h1 class="text-gradient text-dark"><span id="sttsact"></span> {{ $data->jenis }} <span class="text-lg ms-n1"></span></h1>
                                 <h4 class="mb-0 font-weight-bolder opacity-7">Status</h4>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row mt-4">
                     <div class="col-md-6">
                         <div class="card">
                             <div class="card-body text-center">
                                 <h1 class="text-gradient text-dark"><span id="offset"></span> {{ $data->offsite }}</h1>
                                 <h4 class="mb-0 font-weight-bolder opacity-7">Offset Sensor</h4>
                             </div>
                         </div>
                     </div>
                 @endforeach
                 @foreach($osmupdate as $data)
                     <div class="col-md-6 mt-md-0 mt-4">
                         <div class="card">
                             <div class="card-body text-center">
                                 <h6 class="text-gradient text-dark"><span id="absen"></span> {{ $data->nama }} | {{ $data->jabatan }} </h6>
                                 <h6 class="text-gradient text-dark"><span id="absen"></span> {{ $data->dt }} </h6>
                                 <h4 class="mb-0 font-weight-bolder opacity-7">Last Check</h4>
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header d-flex pb-0 p-3">
              <h3 class="my-auto">Actual Level Slope Oil Tank - Table</h3>
            </div>
            <div class="card-body p-2 mt-2">
              <div class="card z-index-2">
                  <div class="card-body p-3">
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                              <tr>
                                <th>Date Time</th>
                                <th style="text-align: center">Level (cm)</th>
                                <th style="text-align: center">Tangga</th>
                                <th style="text-align: center">Status </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($monitoring as $data)
                              <tr>
                                <td class="text-sm font-weight-normal">{{ $data -> dt }}</td>
                                <td class="text-sm font-weight-normal" style="text-align: center">{{ $data -> data_sensor }}</td>
                                <td class="text-sm font-weight-normal" style="text-align: center">{{ $data -> stts }}</td>
                                <td class="text-sm font-weight-normal" style="text-align: center">
                                @if($data->stts == 8)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->stts == 7)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->stts == 6)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->stts == 5)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->stts == 4)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->stts == 3)
                                <span class="badge badge-warning badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->stts == 2)
                                <span class="badge badge-success badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->stts == 1)
                                <span class="badge badge-success badge-sm">{{ $data -> jenis }}</span>
                                @endif

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
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header d-flex pb-0 p-3">
              <h3 class="my-auto">Actual Level Slope Oil Tank - Chart</h3>
            </div>
            <div class="card-body p-3 mt-2">
              <div class="card z-index-2">
                  <div class="card-header p-3 pb-0">
                    <h6>Tanki - 1 Level Chart</h6>
                  </div>
                  <div class="card-body p-3">
                    <div class="myChart">
                      <canvas id="line-chart-2" height="300"></canvas>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header d-flex pb-0 p-3">
              <h3 class="my-auto">On Site Monitoring Slope Oil Tank - Table</h3>
            </div>
            <div class="card-body p-2 mt-2">
              <div class="card z-index-2">
                  <div class="card-body p-3">
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                              <tr>
                                <th>Date Time</th>
                                <th>Pegawai</th>
                                <th>Level Tangga</th>
                                <th>Level Sensor</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($osm as $data)
                              <tr>
                                <td class="text-sm font-weight-normal">{{ $data -> dt }}</td>
                                <td class="text-sm font-weight-normal">{{ $data -> nama }} <br> {{ $data -> jabatan }}</td>
                                <td class="text-sm font-weight-normal" style="text-align: center">{{ $data -> data_user }}</td>
                                <td class="text-sm font-weight-normal" style="text-align: center">{{ $data -> data_sensor }}</td>
                                <td class="text-sm font-weight-normal" style="text-align: center">
                                @if($data->data_user == 8)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->data_user == 7)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->data_user == 6)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->data_user == 5)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->data_user == 4)
                                <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->data_user == 3)
                                <span class="badge badge-warning badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->data_user == 2)
                                <span class="badge badge-success badge-sm">{{ $data -> jenis }}</span>
                                @elseif($data->data_user == 1)
                                <span class="badge badge-success badge-sm">{{ $data -> jenis }}</span>
                                @endif
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
          </div>
        </div>
      </div>
      <hr class="horizontal dark my-5">
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-8 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © 2023,
                Created by
                <a href="https://www.teknoklop.com" class="font-weight-bold" target="_blank">Tekno Klop Indonesia</a>
                 ~ Automation Industrial Internet of Things Support.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

  </main>
  @extends ('layouts.setting')
  <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
  @extends ('layouts.script')
  <Script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true,
      perPage: 5
    });
  </Script>
  <Script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true,
      perPage: 5
    });
  </Script>
  <script>
  // Fetch data from PHP using AJAX
  fetch('fetch_data_monitoring.php')
    .then(response => response.json())
    .then(data => {
      // Data manipulation and Chart.js setup
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'line', // You can choose other chart types based on your data
        data: {
          labels: data.map(entry => entry.dt),
          datasets: [{
            label: 'Monitoring Data Sensor',
            data: data.map(entry => entry.data_sensor),
            backgroundColor: '#DB3056', // Adjust as needed
            borderColor: '#851D41', // Adjust as needed
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
        }
      });
    })
    .catch(error => console.error('Error fetching data:', error));
</script>



</body>
@endsection
