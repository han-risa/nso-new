@extends ('layouts.head')
@section('body')
<body class="g-sidenav-show  bg-gray-100">
  @extends ('layouts.sidebar')
  
  <!-- Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing user -->
                    <form id="editForm" action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="editId">
                        <div class="mb-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="editNama" name="nama" required>
                        </div>
                        <div class="mb-3">
                          <label for="jabatan" class="form-label">Jabatan</label>
                          <input type="text" class="form-control" id="editJabatan" name="jabatan" required>
                        </div>
                        <div class="mb-3">
                          <label for="role" class="form-label">Role</label>
                          <select class="form-select" id="editRole" name="role" required>
                            <option value="1">Admin</option>
                            <option value="2">Assisten Manager</option>
                            <option value="3">Staff</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="nip" class="form-label">NIP</label>
                          <input type="text" class="form-control" id="editNip" name="nip" required>
                        </div>
                        <div class="mb-3">
                          <label for="user" class="form-label">User</label>
                          <input type="text" class="form-control" id="editUser" name="user" required>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="editPassword" name="password"  required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-3 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Request - Draining</li>
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
                  <h5 class="mb-0">Draining List</h5>
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                  <div class="ms-auto my-auto">
                    <a href="./new-product.html" class="btn bg-gradient-primary btn-sm mb-0" target="_blank"><i class="fa-solid fa-plus"></i>  ADD</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-flush" id="datatable-search">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>ID Request</th>
                    <th>Requester</th>
                    <th>Date Time</th>
                    <th>Kegiatan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($drain as $index => $data)
                 <tr>
                  <td class="text-sm font-weight-normal">{{ $index + 1 }}</td>
                  <td class="text-sm font-weight-normal"><a href="">{{ $data -> req }}</a></td>
                  <td class="text-sm font-weight-normal">{{ $data -> user_nama }} <br> {{ $data -> user_jabatan }}</td>
                  <td class="text-sm font-weight-normal">{{ $data -> date }}</td>
                  <td class="text-sm font-weight-normal">{{ $data -> kegiatan }}</td>
                  <td class="text-sm font-weight-normal">
                    @if($data->stts == 9)
                      <span class="badge badge-danger badge-sm">{{ $data -> jenis }}</span>
                    @elseif($data->stts == 10)
                      <span class="badge badge-warning badge-sm">{{ $data -> jenis }}</span>
                    @elseif($data->stts == 11)
                      <span class="badge badge-success badge-sm">{{ $data -> jenis }}</span>
                    @endif  
                  </td>
                  <td class="text-sm font-weight-normal">
                    @if($data->stts == 9)
                      <button type="button" class="btn btn-warning" onclick="openEditModal('{{ json_encode($data) }}')">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-info" onclick="openEditModal('{{ json_encode($data) }}')">
                        <i class="fa-solid fa-file-signature"></i>
                    </button>
                    <form action="{{ route('user.destroy', ['id' => $data -> id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    @elseif($data->stts == 10)
                      <button type="button" class="btn btn-success" onclick="openEditModal('{{ json_encode($data) }}')">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </button>
                    <form action="{{ route('user.destroy', ['id' => $data -> id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    @elseif($data->stts == 11)
                      <form action="{{ route('user.destroy', ['id' => $data -> id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
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
  <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
  @extends ('layouts.script')
  <Script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </Script>
</body>
@endsection
