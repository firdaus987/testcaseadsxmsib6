@extends('frontend/layouts.template')  

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Test Case FSWD</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Semoga Lolos</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="/login" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Mulai</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('frontend/assets/img/ads x mbkm.png')}}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-8 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Tentang Study Case</h2>
              <p class="text-justify" >
                Peserta seleksi program MSIB 6 Posisi full-stack web developer di ADS Digital Partner. <br/>
                1. Membuat CRUD karyawan.<br/>
                2. Menampilkan 3 karyawan yang pertama kali bergabung.<br/>
                3. Menampilkan daftar karyawan yang saat ini pernah mengambil cuti.<br/>
                4. Menampilkan sisa cuti setiap karyawan (kuota cuti 12 hari/tahun). 
              </p>
              <!-- <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div> -->
            </div>
          </div>

          <div class="col-lg-4 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('frontend/assets/img/about.jpg')}}" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

  

  </main><!-- End #main -->

@endsection