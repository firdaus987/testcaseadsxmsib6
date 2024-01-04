@extends('backend/layouts.template')
@section('content')
     <main id="main" class="main bg-white">
        <div class="bg-white p-3 text-center">
            <img src="{{ asset('admin_backend/assets/img/not_filled.png') }}" alt="" class="col-12 col-sm-8 col-md-6 col-xl-5">
            <h4 class="font-bold pt-4">Ups! Kamu belum mengisi Kuisioner!</h4>
            <p class="pt-1 text-secondary">Sebelum dapat mengakses materi pemebelajaran, kamu harus mengisi kuisioner dan melakukan pretest. Hasil dari pretest akan digunakan untuk menentukan materi pembelajaran yang cocok untuk kamu nantinya </p>
            
        
            <div class="mt-4 mb-1 text-center">
                <a href="{{ route('user.questionnaire.instruction') }}" class="btn btn-primary">Mulai Isi Kuesioner <i class="bi bi-arrow-right"></i></a>
            </div>
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