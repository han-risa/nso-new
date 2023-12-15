@extends ('layouts.head')
@section('body')
    <body class="">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    <nav
                        class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid">
                            <img src="/assets/img/en.png" alt="" style="width: 230px">
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div class="card card-plain bg-gradient-dark">
                                    <div class="card-header pb-0 text-start bg-gradient-warning">
                                        <h4 class="font-weight-bolder text-white">Sign In</h4>
                                        <p class="mb-0 text-white opacity-7">Enter your username and password to sign in</p>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" action="{{ route('authenticate') }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-lg" name="username"
                                                    placeholder="Username" aria-label="Email" title="Insert Username">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-lg" name="password"
                                                    placeholder="Password" aria-label="Password" title="Insert Password">
                                            </div>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-lg bg-gradient-warning btn-lg w-100 mt-4 mb-0"
                                                    >Sign
                                                    in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                                <div
                                    class="position-relative bg-gradient-warning h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                                    <img src="/assets/img/shapes/pattern-lines.svg" alt="pattern-lines"
                                        class="position-absolute opacity-4 start-0">
                                    <div class="position-relative">
                                        <img class=" position-relative z-index-2"
                                            src="/assets/img/illustrations/k3panjang.png" alt="chat-img" style="width: 40%">
                                    </div>
                                    <h1 class="mt-5 text-white font-weight-bolder">Noli Slope Oil</h1>
                                    <h3 class="text-white">"Don't forget to carry out regular checks,<br>and
                                        always remember to be safe at work"</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--   Core JS Files   -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <!-- Kanban scripts -->
        <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
        <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
    </body>
@endsection
