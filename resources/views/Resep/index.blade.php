<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Resep</title>
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
                            </span> Data Resep
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
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title">Resep Non Racikan</h3>
                                </div>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('Resep-Store') }}" role="form" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">

                                            <input type="text" class="form-control" placeholder="Racikan Nama"
                                                name="racikan_nama" value="empty" hidden>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Nama Obat</label>
                                            <select class="form-control selectpicker" data-live-search="true"
                                                name="obatalkes_nama" id="obatalkes_nama">
                                                @foreach ($obat as $o)
                                                    @if ($o->stok > 0)
                                                        <option value="{{ $o->obatalkes_nama }}"
                                                            data-stok="{{ $o->stok }}">{{ $o->obatalkes_nama }} -
                                                            stok tersedia: {{ $o->stok }}</option>
                                                    @else
                                                        <option value="{{ $o->obatalkes_nama }}" disabled>
                                                            {{ $o->obatalkes_nama }} - stok habis</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Nama Signa</label>
                                            <select class="form-control selectpicker" data-live-search="true"
                                                name="signa_nama" id="inputData">
                                                @foreach ($signa as $s)
                                                    <option value="{{ $s->signa_nama }}">{{ $s->signa_nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">QTY</label>
                                            <input type="number" class="form-control" placeholder="QTY" name="qty"
                                                id="qty">
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title">Resep Racikan</h3>
                                </div>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('Racikan-Store') }}" role="form" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="">Racikan Nama</label>
                                            <input type="text" class="form-control" placeholder="Racikan Nama"
                                                name="racikan_nama">
                                        </div>
                                        <div id="racikanContainer">
                                            <div class="racikan-item">
                                                <div class="form-group mb-3">
                                                    <label for="">Nama Obat</label>
                                                    <select class="form-control selectpicker" data-live-search="true"
                                                        name="obatalkes_nama[]" id="obatalkes_nama">
                                                        @foreach ($obat as $o)
                                                            @if ($o->stok > 0)
                                                                <option value="{{ $o->obatalkes_nama }}"
                                                                    data-stok="{{ $o->stok }}">
                                                                    {{ $o->obatalkes_nama }} - stok tersedia:
                                                                    {{ $o->stok }}</option>
                                                            @else
                                                                <option value="{{ $o->obatalkes_nama }}" disabled>
                                                                    {{ $o->obatalkes_nama }} - stok habis</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">QTY</label>
                                                    <input type="number" class="form-control" placeholder="QTY"
                                                        name="qty[]" id="qty">
                                                </div>

                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success form-group mb-3"
                                            id="addRacikanItem">Tambah Obat</button>
                                        <div class="form-group mb-3">
                                            <label for="">Nama Signa</label>
                                            <select class="form-control selectpicker" data-live-search="true"
                                                name="signa_nama" id="inputData">
                                                @foreach ($signa as $s)
                                                    <option value="{{ $s->signa_nama }}">{{ $s->signa_nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2>Table Non Racikan</h2>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Obat</th>
                                                            <th scope="col">Nama Signa</th>
                                                            <th scope="col">QTY</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $index = 1; @endphp
                                                        @foreach ($resep as $r)
                                                            @if ($r->racikan_nama === 'empty')
                                                                <tr>
                                                                    <td>{{ $index }}</td>
                                                                    <td>{{ $r->obatalkes_nama }}</td>
                                                                    <td>{{ $r->signa_nama }}</td>
                                                                    <td>{{ $r->qty }}</td>
                                                                    <td>
                                                                        <a
                                                                            href="{{ route('print.row', $r->resep_id) }}">
                                                                            <button type="button"
                                                                                class="btn btn-info">Cetak Ini</button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @php $index++; @endphp
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <h2>Table Racikan</h2>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Racikan Nama</th>
                                                            <th scope="col">Nama Obat</th>
                                                            <th scope="col">Nama Signa</th>
                                                            <th scope="col">QTY</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $index = 1; @endphp
                                                        @foreach ($resep as $r)
                                                            @if ($r->racikan_nama !== 'empty')
                                                                <tr>
                                                                    <td>{{ $index }}</td>
                                                                    <td>{{ $r->racikan_nama }}</td>
                                                                    <td>{{ $r->obatalkes_nama }}</td>
                                                                    <td>{{ $r->signa_nama }}</td>
                                                                    <td>{{ $r->qty }}</td>
                                                                    <td>
                                                                        <a
                                                                            href="{{ route('print.row', $r->resep_id) }}">
                                                                            <button type="button"
                                                                                class="btn btn-info">Cetak Ini</button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @php $index++; @endphp
                                                            @endif
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
        document.getElementById('addRacikanItem').addEventListener('click', function() {
            var container = document.getElementById('racikanContainer');
            var newItem = document.querySelector('.racikan-item').cloneNode(true);
            container.appendChild(newItem);
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var qtyInput = document.getElementById('qty');
            var obatSelect = document.getElementById('obatalkes_nama');

            qtyInput.addEventListener('change', function() {
                validateQuantity();
            });

            function validateQuantity() {
                var selectedOption = obatSelect.options[obatSelect.selectedIndex];
                var stock = parseInt(selectedOption.dataset.stok);
                var qty = parseInt(qtyInput.value);

                if (qty > stock) {
                    alert('Jumlah yang dimasukkan melebihi stok obat yang tersedia.');
                    qtyInput.value = stock;
                }
            }
        });
    </script>

</body>

</html>
