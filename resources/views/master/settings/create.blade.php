@extends ('layouts.head')
@section('body')
<body class="g-sidenav-show  bg-gray-100">
  @extends ('layouts.sidebar')
  <!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form for inputting data here -->
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="1">Admin</option>
                                <option value="2">Assisten Manager</option>
                                <option value="3">Staff</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" required>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">User</label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                <form id="editForm" method="POST">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Home Dashboard</li>
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
                      <h5 class="mb-0">Create user</h5>
                    </div>
                  </div>
                </div>
                <form id="Form" action="{{ route('user.store') }}" method="POST" class="m-3">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" value = "{{ old('nama', $user->nama ?? '') }}"
                        name="nama" required>
                      </div>
                      <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="editJabatan" value = "{{ old('jabatan', $user->jabatan ?? '') }}"
                         name="jabatan" required>
                      </div>
                      <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="editRole" name="role" required>
                          @foreach ($roles as $id => $name)
                            <option value="{{ $id }}" 
                            {{  (isset($user) && $user->roles->pluck('id')->contains($id)) ? 'selected' : '' }}
                            >{{ $name }}</option>
                           @endforeach
                        </select>
                        
                      </div>
                      <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="editNip"  value = "{{ old('nip', $user->nip ?? '') }}"
                        name="nip" required>
                      </div>
                      <div class="mb-3">
                        <label for="user" class="form-label">User</label>
                        <input type="text" class="form-control" id="editUser" value = "{{ old('username', $user->username ?? '') }}"
                         name="username" required>
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="editPassword" name="password"  required>
                      </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('user.index') }}" class="btn btn-danger me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
</body>
@endsection
