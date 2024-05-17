  <!DOCTYPE html>
  <html lang="en">

  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Data User</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="{{ url('') }}/temp/assets/vendors/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="{{ url('') }}/temp/assets/vendors/css/vendor.bundle.base.css">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <!-- endinject -->
      <!-- Layout styles -->
      <link rel="stylesheet" href="{{ url('') }}/temp/assets/css/style.css">
      <!-- End layout styles -->
      <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>

  <body>
      <div class="container-scroller">

          <!-- partial:partials/_navbar.html -->
          @include('Layout.nav')
          <!-- partial -->
          <div class="container-fluid page-body-wrapper">
              <!-- partial:partials/_sidebar.html -->
              @include('Layout.side')
              <!-- partial -->
              <div class="main-panel">
                  <div class="content-wrapper">
                      <div class="page-header">
                          <h3 class="page-title">
                              <span class="page-title-icon bg-gradient-primary text-white me-2">
                                  <i class="mdi mdi-home"></i>
                              </span> Data User
                          </h3>
                          <nav aria-label="breadcrumb">
                              <ul class="breadcrumb">
                                  <li class="breadcrumb-item active" aria-current="page">
                                      <span></span>Overview <i
                                          class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                  </li>
                              </ul>
                          </nav>
                      </div>
                      <div class="row">


                      </div>



                      <div class="row">
                          <div class="col-md-12 grid-margin stretch-card">
                              <div class="card">
                                  <div class="card-body">

                                      <div class="table-responsive">
                                          <table class="table">
                                              @if (session('success'))
                                                  <div class="alert alert-success" role="alert">
                                                      <span>{{ session('success') }}</span>
                                                  </div>
                                              @endif
                                              @if (session('error'))
                                                  <div class="alert alert-danger" role="alert">
                                                      <span>{{ session('error') }}</span>
                                                  </div>
                                              @endif
                                              <thead>
                                                  <tr>
                                                      <th scope="col">No</th>
                                                      <th scope="col">Nama</th>
                                                      <th scope="col">Email</th>
                                                      <th scope="col">Password</th>
                                                      <th scope="col">Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <h2>Master User</h2><button type="button"
                                                      class="btn btn-primary btn-md" data-bs-toggle="modal"
                                                      data-bs-target="#modalId">
                                                      Tambah Data User
                                                  </button>

                                                  <!-- Modal -->
                                                  <div class="modal fade" id="modalId" tabindex="-1" role="dialog"
                                                      aria-labelledby="modalTitleId" aria-hidden="true">
                                                      <form action="{{ route('User-Store') }}" role="form"
                                                          method="post">
                                                          @csrf
                                                          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                              role="document">
                                                              <div class="modal-content">
                                                                  <div class="modal-header">
                                                                      <h5 class="modal-title" id="modalTitleId">
                                                                          Tambah Data
                                                                      </h5>
                                                                      <button type="button" class="btn-close"
                                                                          data-bs-dismiss="modal"
                                                                          aria-label="Close"></button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                      <div class="form-group mb-3">

                                                                          <input type="text" class="form-control"
                                                                              id="inputData" placeholder="Nama Anda"
                                                                              name="name">
                                                                      </div>
                                                                      <div class="form-group mb-3">

                                                                          <input type="email" class="form-control"
                                                                              id="inputData" placeholder="Emal Anda"
                                                                              name="email">
                                                                      </div>
                                                                      <div class="form-group mb-3">

                                                                          <input type="password" class="form-control"
                                                                              id="inputData" placeholder="Password Anda"
                                                                              name="password">
                                                                      </div>
                                                                      <div class="form-group mb-3">

                                                                          <input type="text" class="form-control"
                                                                              name="role" value="user" readonly
                                                                              hidden>

                                                                      </div>

                                                                  </div>
                                                                  <div class="modal-footer">
                                                                      <button type="button" class="btn btn-secondary"
                                                                          data-bs-dismiss="modal" aria-label="Close">
                                                                          Close
                                                                      </button>

                                                                      <button type="submit"
                                                                          class="btn btn-primary">Save</button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </form>
                                                  </div>
                                                  @php($index = 1)
                                                  @foreach ($user as $u)
                                                      <tr>

                                                          <td>{{ $index }}</td>
                                                          <td>{{ $u->name }}</td>
                                                          <td>{{ $u->email }}</td>
                                                          <td>{{ $u->password }}</td>

                                                          <td>

                                                              <button class="btn btn-warning" data-bs-toggle="modal"
                                                                  data-bs-target="#editModal{{ $u->id }}">Ubah
                                                                  Password</button>
                                                              <div class="modal fade" id="editModal{{ $u->id }}"
                                                                  tabindex="-1"
                                                                  aria-labelledby="editModal{{ $u->id }}Label"
                                                                  aria-hidden="true">
                                                                  <div class="modal-dialog">
                                                                      <div class="modal-content">
                                                                          <div class="modal-header">
                                                                              <h5 class="modal-title"
                                                                                  id="editModal{{ $u->id }}Label">
                                                                                  Edit User</h5>
                                                                              <button type="button" class="btn-close"
                                                                                  data-bs-dismiss="modal"
                                                                                  aria-label="Close"></button>
                                                                          </div>
                                                                          <div class="modal-body">

                                                                              <form
                                                                                  action="{{ url('User-Update/' . $u->id) }}"
                                                                                  method="POST">
                                                                                  @csrf
                                                                                  @method('PUT')
                                                                                  <div class="mb-3">

                                                                                      <input type="text"
                                                                                          class="form-control"
                                                                                          id="editUser{{ $u->name }}"
                                                                                          name="name"
                                                                                          value="{{ $u->name }}"
                                                                                          readonly hidden>
                                                                                  </div>
                                                                                  <div class="mb-3">

                                                                                      <input type="email"
                                                                                          class="form-control"
                                                                                          id="editEmail{{ $u->email }}"
                                                                                          name="email"
                                                                                          value="{{ $u->email }}"
                                                                                          readonly hidden>
                                                                                  </div>

                                                                                  <div class="mb-3">
                                                                                      <input type="password"
                                                                                          class="form-control"
                                                                                          name="password"
                                                                                          value="{{ $u->password }}"
                                                                                          placeholder="password anda"
                                                                                          id="inputData">


                                                                                  </div>

                                                                                  <div class="mb-3">
                                                                                      <input type="text"
                                                                                          class="form-control"
                                                                                          id="editPassword{{ $u->role }}"
                                                                                          name="role"
                                                                                          value="{{ $u->role }}"
                                                                                          readonly hidden>
                                                                                  </div>

                                                                                  <button type="submit"
                                                                                      class="btn btn-primary">Update</button>
                                                                              </form>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                      @php($index++)
                                                  @endforeach


                                              </tbody>
                                          </table>

                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <!-- content-wrapper ends -->
                  <!-- partial:partials/_footer.html -->
                  @include('Layout.footer')
                  <!-- partial -->
              </div>
              <!-- main-panel ends -->
          </div>
          <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="{{ url('') }}/temp/assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="{{ url('') }}/temp/assets/vendors/chart.js/Chart.min.js"></script>
      <script src="{{ url('') }}/temp/assets/js/jquery.cookie.js" type="text/javascript"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="{{ url('') }}/temp/assets/js/off-canvas.js"></script>
      <script src="{{ url('') }}/temp/assets/js/hoverable-collapse.js"></script>
      <script src="{{ url('') }}/temp/assets/js/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="{{ url('') }}/temp/assets/js/dashboard.js"></script>
      <script src="{{ url('') }}/temp/assets/js/todolist.js"></script>
      <!-- End custom js for this page -->


      <script>
          var modalId = document.getElementById('modalId');

          modalId.addEventListener('show.bs.modal', function(event) {
              // Button that triggered the modal
              let button = event.relatedTarget;
              // Extract info from data-bs-* attributes
              let recipient = button.getAttribute('data-bs-whatever');

              // Use above variables to manipulate the DOM
          });
      </script>
    
  </body>

  </html>
