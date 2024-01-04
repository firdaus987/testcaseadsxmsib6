@extends('backend/layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="/">Home</a></li> --}}
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Komponen 1: Hasil Nilai Kuesioner KM -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card">
                        <div class="card-body">
                            <h5 class="card-title">Knowledge of Metacognitif (KM) </h5>
                            @foreach ($historiPengisian as $item)
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $item->km_total/85*100 }}%;" aria-valuenow="{{ $item->km_total }}" aria-valuemin="0" aria-valuemax="85"></div>
                            </div>
                            <div class="pt-1 d-flex justify-content-between"><span>Nilai anda</span> {{ $item->km_total }} ({{ $item->km_class }})</div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- End Hasil Nilai Kuesioner KM -->


                <!-- Komponen 2: Hasil Nilai Kuesioner RM -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card">
                        <div class="card-body">
                            <h5 class="card-title">Regulation of Metacognitif (RM) </h5>
                            @foreach ($historiPengisian as $item)
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $item->km_total/175*100 }}%;" aria-valuenow="{{ $item->rm_total }}" aria-valuemin="0" aria-valuemax="175"></div>
                            </div>
                            <div class="pt-1 d-flex justify-content-between"><span>Nilai anda</span> {{ $item->rm_total }} ({{ $item->rm_class }})</div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- End Hasil Nilai Kuesioner RM -->

                {{-- <!-- Komponen 3: Rangkuman -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card">
                        <div class="card-body">
                            <h5 class="card-title">Kategori Hasil</h5>
                            <!-- Tambahkan rangkuman seperti "Low / Medium / High" -->
                            <ul>
                                @foreach ($historiPengisian as $item)
                                <p>Nilai KM = {{ $item->km_class }}</p>
                                <p>Nilai RM = {{ $item->rm_class }}</p><br>
                                @endforeach
                            </ul>  
                        </div>
                    </div>
                </div><!-- End Rangkuman --> --}}

                <!-- Komponen 4: Histori Pengisian Kuesioner -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Histori Pengisian Kuesioner</h5>
                            <!-- <ul>
                                @foreach ($historiPengisian as $item)
                                <li>{{ $item->created_at }} </li>
                                @endforeach
                            </ul> -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Periode</th>
                                        <th>KM</th>
                                        <th>RM</th>
                                        <th>Detail</th>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td>{{ $result->formatted_created_at }}</td>
                                                <td>{{ $result->periode->semester.' '.$result->periode->tahun }}</td>
                                                <td>{{ $result->km_class }}</td>
                                                <td>{{ $result->rm_class }}</td>
                                                <td><a href="{{ route('userResult.show', ['user_result' => $result->id]) }}" class="btn btn-primary btn-sm">Download</a></td>
                                            </tr>
                                            <?php $i++;?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- End Histori Pengisian Kuesioner -->

                <!-- Komponen 5: Penjelasan KM -->
                <div class="col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Penjelasan KM</h5>
                            <!-- Tambahkan penjelasan tentang KM di sini -->
                            <p class="justify">Knowledge of Metacognitif (KM) merupakan pengetahun individu terhadap kognitifnya. Knowledge of metacognitive terdiri dari pengetahuan prosedural yang merupakan pengetahuan bagaimana seseorang melakukan sesuatu, pengetahuan deklaratif mencakup pengetahuan tentang kegiatan yang akan dilakukan sebagai pembelajar dan apa yang mempengaruhi kegiatannya, pengdeklaratif, dan kondisional, serta pengetahuan kondisional yakni pengetahuan tentang kapan dan mengapa menggunakan pengetahuan prosedural dan deklaratif.  </p>
                            {{-- <small> <p>Keterangan Nilai KM:</p> </small>
                            <small> <p>KM High ≥ 63</p> </small>
                            <small> <p>KM Medium ≥ 42</p> </small>
                            <small> <p>KM Low < 42 </p> </small> --}}
                        </div>
                    </div>
                </div><!-- End Penjelasan KM -->

                <!-- Komponen 6: Penjelasan RM -->
                <div class="col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Penjelasan RM</h5>
                            <!-- Tambahkan penjelasan tentang RM di sini -->
                            <p class="justify"> Regulation of Metacognitif (RM) merupakan kemampuan mengontrol pembelajaran, melakukan sesuatu atau melakukan perbaikan terhadap kesalahannya. Pembelajar mengatur kegiatan pembelajarannya dengan melibatkan perencanaan dan pengawasan terhadap aktivitas kognitif yang digunakan. Kemampuan metakognitif ini merupakan kunci bagi pengembangan berpikir kritis.</p>
                            {{-- <small> <p>Keterangan Nilai RM :</p> </small>
                            <small> <p>RM High ≥ 132</p> </small>
                            <small> <p>RM Medium ≥ 88</p> </small>
                            <small> <p>RM Low < 88 </p> </small> --}}
                        </div>
                    </div>
                </div><!-- End Penjelasan RM -->


            </div>
        </section>

    </main><!-- End #main -->
@endsection
