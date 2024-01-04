@extends('backend/layouts.template')
@section('content')
     <main id="main" class="main bg-white">
        <div class="bg-white p-3 text-center">
            <div class="d-flex justify-content-center w-100">
                <div class="col-lg-6 col-xl-5 col-md-8 col-sm-11 col-12 d-flex">
                    <img src="{{ asset('admin_backend/assets/img/closed_questionnaire.svg') }}" alt="" style="max-width:100%; max-height:100%;">
                </div>
            </div>
            <h4 class="font-bold pt-4">Ups! Periode pengisian kuesioner belum dibuka!</h4>
            <p class="pt-1 text-secondary">Silakan kembali lagi nanti atau cek informasi terbaru untuk melihat kapan periode pengisian akan dibuka. Terima kasih atas pengertiannya.</p>
        </div>
     </main>
 @endsection
 @section('script')
     <script>
        $(document).ready(function() {
            $("#sidebar-questionnaire").removeClass("collapsed");
        });
     </script>
 @endsection