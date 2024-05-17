<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Obat</title>
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
                </span> Data Obat
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                    
                    <div class="table-responsive" style="height:550px; overflow-y: scroll;">
                        <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Obat</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Stok Obat</th>
            </tr>
        </thead>
        <tbody>
            <h2>Master Obat</h2>
            @foreach($obat as $o)
            <tr>

                <td>{{ $o->obatalkes_id }}</td>
                <td>{{ $o->obatalkes_kode }}</td>
                <td>{{ $o->obatalkes_nama }}</td>
                <td>{{ $o->stok }}</td>
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
   
  </body>
</html>