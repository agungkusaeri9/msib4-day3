@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="dates" class="form-control">
                    </div>
                </div>
                <div class="col-md">
                    <select name="product" id="product" class="products">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaksi Berdasarkan Produk</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myPie" style="w-100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/chart.js/Chart.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script>
        $(function() {
            $('input[name="dates"]').daterangepicker();
            $('.products').select2({
                theme: 'bootstrap4',
            });

            let purchase_order = function() {
                let data;
                $.ajax({
                    url: '{{ route('admin.tugas11.purchase-order-json') }}',
                    type: 'POST',
                    async: false,
                    dateType: 'JSON',
                    success: function(response) {
                        data = response;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })

                return data;
            }
            let chartPurchaseOrder = purchase_order();
            const myPie = document.getElementById('myPie');
            myPie.width = 1000;
            new Chart(myPie, {
                type: 'pie',
                data: {
                    labels: chartPurchaseOrder[0],
                    datasets: [{
                        label: '# of Votes',
                        data: chartPurchaseOrder[1],
                        backgroundColor: [
                            'rgba(255, 92, 112, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 05, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        })
    </script>
@endpush
