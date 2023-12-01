@extends('index')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Table</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table</li>
            </ol>
        </div>
    </div>
    <a href="javascript:history.go(-1);" class="btn btn-primary">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Profile</h3>
        </div>
        <div class="card-body">
            <form id="form-edit-profile"
                action="{{ url('/admin/pengaturan/profile_saya/edit_profile/' . Auth::user()->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ Auth::user()->username }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="{{ Auth::user()->alamat }}">
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                        value="{{ Auth::user()->no_telp }}">
                </div>

                <div class="card-footer text-end">
                    <button type="reset" class="btn btn-icon btn-danger mt-1">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-icon btn-success mt-1">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var formEditProfile = document.getElementById('form-edit-profile');

        formEditProfile.addEventListener('submit', function(e) {
            e.preventDefault(); // Menghentikan pengiriman form saat ini

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menyimpan perubahan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, maka kirim formulir
                    formEditProfile.submit();
                }
                // Jika pengguna tidak mengonfirmasi, tidak ada tindakan tambahan yang diambil.
            });
        });
    </script>
@endsection
