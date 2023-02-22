@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">Create Product</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.purchase-orders.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="product_id" class="col-md-3 col-form-label">Product Name</label>
                           <div class="col-md-9">
                            <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Product</option>
                                @foreach ($products as $product)
                                    <option @if($product->id == old('product_id')) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                           </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-3 col-form-label">Code</label>
                            <div class="col-md-9">
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" value="{{ old('code') }}" readonly>
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-3 col-form-label">Price</label>
                            <div class="col-md-9">
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}" readonly>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-md-3 col-form-label">Qty</label>
                            <div class="col-md-9">
                                <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty" value="{{ old('qty') }}">
                                @error('qty')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-md-3 col-form-label">Discount</label>
                            <div class="col-md-9">
                                <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" value="{{ old('discount') }}">
                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total" class="col-md-3 col-form-label">Total</label>
                            <div class="col-md-9">
                                <input type="number" name="total" class="form-control @error('total') is-invalid @enderror" id="total" value="{{ old('total') }}" readonly>
                                @error('total')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('admin.purchase-orders.index') }}" class="btn btn-warning">Cancel</a>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(function(){
            $('#product_id').select2({
                theme:'bootstrap4'
            })

            $('#product_id').on('change', function(){
                let product_id = $(this).val();

                $.ajax({
                    url:'{{ url("admin/products") }}' + '/' + product_id,
                    type:'GET',
                    dataType:'JSON',
                    success: function(res){
                        $('#code').val(res.code);
                        $('#price').val(res.price);
                    }
                })
            })

            $('#discount').on('keyup', function(){
                let price = $('#price').val();
                let discount = $(this).val();
                let qty = $('#qty').val();

                let total = (price * qty) - discount;
                $('#total').val(total);
            })
        })
    </script>
@endpush
