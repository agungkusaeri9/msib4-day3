@extends('layouts.app')
@section('content')
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Menghitung Luas Persegi Panjang dengan Jquery</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 mb-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">Form</div>
                    </div>
                    <div class="card-body">
                        <form action="javscript:void(0)" method="post" id="form">
                            <div class="mb-3">
                                <label for="panjang" class="form-label">Panjang</label>
                                <input type="number" name="panjang" class="form-control" id="panjang" placeholder="Masukan Panjang (cm)" required>
                            </div>
                            <div class="mb-3">
                                <label for="lebar" class="form-label">Lebar</label>
                                <input type="number" name="lebar" class="form-control" id="lebar" placeholder="Masukan Lebar (cm)" required>
                            </div>
                            <div class="mb-3 mt-2">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary w-100">Hitung</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
               <div class="tampilan-hasil">

               </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function(){
            $('#form').on('submit', function(){

                let panjang = $('input[name=panjang]').val();
                let lebar = $('input[name=lebar]').val();
                let luas = panjang * lebar;
                let hasilMessage = `Jadi luas persegi panjang dengan panjang = ${panjang} dan lebar ${lebar} adalah ${luas}`;
                $('.tampilan-hasil').html(hasilMessage);
            })
        })
    </script>
@endpush
