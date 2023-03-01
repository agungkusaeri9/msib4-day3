@extends('layouts.app')
@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
          <div class="border border-3 border-primary"></div>
          <div class="card bg-white">
            <div class="card-body p-5">
              <form class="mb-3 mt-md-4" action="{{ route('login') }}" method="post">
                @csrf
                <h2 class="fw-bold mb-2 text-uppercase ">Brand</h2>
                <p class=" mb-5">Please enter your login and password!</p>
                <div class="mb-3">
                  <label for="username" class="form-label ">Username</label>
                  <input type="text" class="form-control" id=" username" name="username" placeholder="username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label ">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="*******">
                </div>
                <p class="small"><a class="text-primary" href="#">Forgot password?</a></p>
                <div class="d-grid">
                  <button class="btn btn-outline-dark" type="submit">Login</button>
                </div>
              </form>
              <div class="text-center">
                <span class="text-center small">Or</span>
              </div>
              <div class="d-grid">
                <a href="{{ route('tugas9.google-view') }}" class="btn btn-dark mt-3" type="submit">Login or Sign in With Google</a>
              </div>
              <div>
                <p class="mb-0  text-center">Don't have an account? <a href="signup.html"
                    class="text-primary fw-bold">Sign
                    Up</a></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
    </style>
@endpush
