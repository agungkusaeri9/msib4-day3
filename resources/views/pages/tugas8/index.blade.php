@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="bar-chart" width="800" height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei","Jun","Jul","Agu","Sept","Okt","Nov","Des"],
      datasets: [
        {
          label: "Transaksi tahun 2023",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#c45340","#c42650","#c45350","#c45850","#c45050","#c45550","#c45820"],
          data: [2478,5267,734,784,433,34,112,345,333,678,654,334]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Laporan Transaksi tahun 2023'
      }
    }
});
</script>
@endpush
