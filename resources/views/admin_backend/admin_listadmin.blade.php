@extends('admin_backend/layouts.template')

@section('content')
    <main id="main" class="main">
    
    <div class="pagetitle">
    <h1>Admin Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">List Admin</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Admin</h6><br/>
                    <button class="btn btn-primary ellipsis" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Tambah Admin</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Induk</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                                @foreach($users as $user)
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td>{{ $user->no_induk }}</td>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->tgl_lahir }}</td>
                                    <td>{{ $user->tgl_bergabung }}</td>
                                    
                                    <td> 
                                        <button class="btn btn-outline-dark btn-sm edit-button" data-bs-toggle="modal" data-bs-target="#editModal" data-user='{{ json_encode($user) }}'>
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>
                                        <span class="p-1"></span>
                                        <form action="{{ route('adminListAdmin.destroy', ['listadmin'=>$user->id]) }}" class="d-inline delete-form" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm mt-1 mt-sm-0"><i class="bi bi-trash"></i>Hapus</button>
                                        </form>
                                    </td>
                                    <!-- Tambahkan kolom-kolom lain yang ingin Anda tampilkan -->
                                </tr>
                                <?php $i++;?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

            {{--! start modal create  --}}
            <form action="{{ route('adminListAdmin.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-4">
                                    <label class="col-form-label" for="create-nama">Nama Admin</label>
                                    <input type="text" class="form-control" id="create-nama" name="nama_lengkap" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-form-label" for="create-alamat">NIP</label>
                                    <input type="text" class="form-control" id="create-alamat" name="alamat" placeholder="alamat">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-form-label" for="create-email">E-mail</label>
                                    <input type="email" class="form-control" id="create-email" name="email" placeholder="E-Mail">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-form-label" for="create-password">Password</label>
                                    <input type="password" class="form-control" id="create-password" name="password" placeholder="password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{--! end modal create  --}}

            {{--! start edit modal  --}}
            <form method="POST" id="edit-form" action="{{ route('adminListAdmin.update',['listadmin' => '0']) }}" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-4">
                                        <label class="col-form-label" for="edit-nama">Nama Admin</label>
                                        <input type="text" class="form-control" id="edit-nama" name="nama_lengkap" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-form-label" for="edit-alamat">alamat</label>
                                        <input type="text" class="form-control" id="edit-alamat" name="alamat" placeholder="NIP">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-form-label" for="edit-email">E-mail</label>
                                        <input type="email" class="form-control" id="edit-email" name="email" placeholder="E-Mail">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{--! end edit modal --}}                                    
    </main><!-- End #main -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#sidebar-listperson").removeClass("collapsed");
            $("#users-nav").addClass("show");
            $("#sidebar-item-listadmin").addClass("active");
        });

        // edit user
        $('.edit-button').click(function () {
            let user = $(this).data('user');
            $('#edit-nama').val(user.nama_lengkap);
            $('#edit-alamat').val(user.alamat);
            $('#edit-email').val(user.email);
            let formAction = "{{ route('adminListAdmin.update', ['listadmin' => 'masuk_sini']) }}".replace('masuk_sini', user.id);
            $('#edit-form').attr('action', formAction);
        });

        // hapus user
        $('.delete-form').click(function(event){
                event.preventDefault();
                Swal.fire({
                    title: 'Yakin untuk dihapus?',
                    text: "Kamu tidak akan bisa mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus ini!',
                    cancelButtonText: 'Batalkan',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).submit();
                    }
                })
            });
</script>
@endsection

