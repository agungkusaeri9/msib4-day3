@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">Edit Purchase Order</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.purchase-orders.update',$item) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="product_name" class="col-md-3 col-form-label">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="product_name" value="{{ $item->product->name ?? old('product_name') }}" readonly>
                                @error('product_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-3 col-form-label">Code</label>
                            <div class="col-md-9">
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" value="{{ $item->product->code ?? old('code') }}" readonly>
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
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $item->product->price ?? old('price') }}" readonly>
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
                                <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty" value="{{ $item->qty ?? old('qty') }}">
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
                                <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" value="{{ $item->discount ?? old('discount') }}">
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
                                <input type="number" name="total" class="form-control @error('total') is-invalid @enderror" id="total" value="{{$item->total ?? old('total') }}" readonly>
                                @error('total')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('admin.purchase-orders.index') }}" class="btn btn-warning">Cancel</a>
                            <button class="btn btn-primary">Update</button>
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

            $('#discount').on('keyup', function(){
                let price = $('#price').val();
                let discount = $(this).val();
                let qty = $('#qty').val();

                let total = (price * qty) - discount;
                $('#total').val(total);
            })

            $('#qty').on('keyup', function(){
                let price = $('#price').val();
                let qty = $(this).val();
                let discount = $('#discount').val();

                let total = (price * qty) - discount;
                $('#total').val(total);
            })
        })
    </script>
@endpush
