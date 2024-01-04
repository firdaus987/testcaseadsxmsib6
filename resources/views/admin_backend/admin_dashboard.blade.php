@extends('admin_backend/layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    {{-- Tampilkan 3 karyawan yang pertama kali bergabung --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            3 Karyawan Pertama Bergabung
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama</th>
                                        <th>Tanggal Bergabung</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                     $firstJoinedEmployees = \App\Models\User::orderBy('tgl_bergabung')->take(3)->get();
                                    @endphp
                                    @foreach($firstJoinedEmployees as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->no_induk }}</td>
                                            <td>{{ $user->nama_lengkap }}</td>
                                            <td>{{ \Carbon\Carbon::parse($user->tgl_bergabung)->format('d-M-y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Tampilkan daftar karyawan yang saat ini pernah mengambil cuti --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            Karyawan yang Pernah Mengambil Cuti
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeesOnLeaveData as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->no_induk }}</td>
                                            <td>{{ $user->nama_lengkap }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Sisa Cuti Setiap Karyawan --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            Sisa Cuti Setiap Karyawan
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama</th>
                                        <th>Sisa Cuti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeesWithRemainingLeave as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->no_induk }}</td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>
                                            @if($user->sisa_cuti > 0)
                                                {{ $user->sisa_cuti }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#sidebar-dashboard").removeClass("collapsed");
    });
</script>
@endsection
