@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 mb-3 border-right">
               <a href="{{ route('tugas5.bootstrap') }}" class="text-decoration-none text-dark">
                <div class="cards">
                    <div class="first bg-white p-4 text-center">
                        <img src="https://img.icons8.com/clouds/100/000000/box.png" />
                        <h5>Bootstrap</h5>
                    </div>
                </div>
               </a>
            </div>
            <div class="col-md-4 mb-3 border-right">
                <a href="{{ route('tugas5.semantic') }}" class="text-decoration-none text-dark">
                 <div class="cards">
                     <div class="first bg-white p-4 text-center">
                         <img src="https://img.icons8.com/clouds/100/000000/box.png" />
                         <h5>Semantic UI</h5>
                     </div>
                 </div>
                </a>
             </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        body {
            background-color: #a3c5db;
        }

        .heading {
            font-size: 20px;
            font-weight: 600;
            color: #3D5AFE;

        }

        .line1 {
            color: #000;
            font-size: 12px;

        }

        .line2 {
            color: #000;
            font-size: 12px;

        }

        .line3 {
            color: #000;
            font-size: 12px;

        }

        .cards {

            transition: all 0.2s ease;
            cursor: pointer;


        }

        .cards:hover {

            box-shadow: 5px 6px 6px 2px #e9ecef;
            transform: scale(1.1);
        }
    </style>
@endpush
