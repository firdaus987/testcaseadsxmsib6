@extends('admin_backend/layouts.template')
@section('content')
    <main id="main" class="main bg-white">
        <div>
            <h4 style="font-weight: bold">Hasil Kategori Metakognitif</h4>
            <p class="text-secondary fs-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, tempora.</p>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <th>NAMA</th>
                    <th>ANGKATAN</th>
                    <th>TANGGAL</th>
                    <th>Periode</th>
                    <th>KM</th>
                    <th>RM</th>
                    <th>ACTION</th>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td style="font-weight: bold">{{ $result->user->nama_lengkap }}</td>
                            <td>{{ $result->user->angkatan }}</td>
                            <td>{{ $result->formatted_created_at }}</td>
                            <td>{{ $result->periode->semester.' '.$result->periode->tahun }}</td>
                            <td>{{ $result->km_class }}</td>
                            <td>{{ $result->rm_class }}</td>
                            <td><a href="{{ route('adminResult.show', ['admin_result' => $result->id]) }}" class="btn btn-primary btn-sm">Download</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#sidebar-result").removeClass("collapsed");
    });
</script>
@endsection