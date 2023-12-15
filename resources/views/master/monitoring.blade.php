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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Logging History - Logging Data</li>
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
              <a href="../../pages/authentication/signin/illustration.html" class="nav-link text-body font-weight-bold px-0" target="_blank">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="d-sm-inline d-none">Sign Out</span>
              </a>
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
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <!-- Card header -->
            <div class="card-header pb-0">
              <div class="d-lg-flex">
                <div>
                  <h5 class="mb-0">Tabel Logging Monitoring</h5>
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                  <div class="ms-auto my-auto">
                    <a href="/export" class="btn bg-gradient-primary btn-sm mb-0" target="_blank"><i class="fa-solid fa-file-export"></i>&nbsp;Export</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-flush" id="datatable-search">
                <thead class="thead-light">
                  <tr>
                    <th>Tanggal</th>
                    <th>Level</th>
                    <th>Tangga</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($monitoring as $data)
                 <tr>
                  <td class="text-sm font-weight-normal">{{ $data -> dt }}</td>
                  <td class="text-sm font-weight-normal" style="text-align: center">{{ $data -> data_sensor }}</td>
                  <td class="text-sm font-weight-normal" style="text-align: center">{{ $data -> stts }}</td>
                  <td class="text-sm font-weight-normal">
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
      <div class="row mt-4">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header d-flex pb-0 p-3">
              <h3 class="my-auto">Actual Level Slope Oil Tank - Chart</h3>
            </div>
            <div class="card-body p-3 mt-2">
              <div class="card z-index-2">
                  <div class="card-header p-3 pb-0">
                  </div>
                  <div class="card-body p-3">
                    <div class="chart">
                      <canvas id="line-chart-2" height="300"></canvas>
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
      pagingType: 'full_numbers'
    });
  </Script>
</body>
@endsection
