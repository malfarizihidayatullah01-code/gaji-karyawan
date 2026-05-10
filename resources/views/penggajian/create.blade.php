@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between mb-3">

        <h3 class="text-primary">
            Tambah Penggajian
        </h3>

        <a
            href="/penggajian"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </div>

    <!-- Error -->
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <!-- Card -->
    <div class="card">

        <div class="card-body">

            <!-- Form -->
            <form action="/penggajian" method="POST">

                @csrf

                <!-- Karyawan -->
                <div class="mb-3">

                    <label class="form-label">
                        Karyawan
                    </label>

                    <select
                        name="karyawan_id"
                        id="karyawan_id"
                        class="form-control"
                    >

                        <option value="">
                            -- Pilih Karyawan --
                        </option>

                        @foreach($karyawans as $karyawan)

                            <option value="{{ $karyawan->id }}">

                                {{ $karyawan->nama_karyawan }}

                                -

                                {{ $karyawan->jabatan->nama_jabatan }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Bulan -->
                <div class="mb-3">

                    <label class="form-label">
                        Bulan
                    </label>

                    <input
                        type="month"
                        name="bulan"
                        class="form-control"
                    >

                </div>

                <!-- Gaji Pokok -->
                <div class="mb-3">

                    <label class="form-label">
                        Gaji Pokok
                    </label>

                    <input
                        type="text"
                        id="gaji_pokok"
                        class="form-control"
                        readonly
                    >

                </div>

                <!-- Tunjangan -->
                <div class="mb-3">

                    <label class="form-label">
                        Tunjangan
                    </label>

                    <input
                        type="text"
                        id="tunjangan"
                        class="form-control"
                        readonly
                    >

                </div>

                <!-- Jam Lembur -->
                <div class="mb-3">

                    <label class="form-label">
                        Jam Lembur
                    </label>

                    <input
                        type="number"
                        name="jam_lembur"
                        id="jam_lembur"
                        class="form-control"
                        value="0"
                    >

                </div>

                <!-- Uang Lembur -->
                <div class="mb-3">

                    <label class="form-label">
                        Uang Lembur
                    </label>

                    <input
                        type="text"
                        id="uang_lembur"
                        class="form-control"
                        value="0"
                        readonly
                    >

                </div>

                <!-- Potongan -->
                <div class="mb-3">

                    <label class="form-label">
                        Potongan
                    </label>

                    <input
                        type="text"
                        id="potongan"
                        class="form-control"
                        value="0"
                        readonly
                    >

                </div>

                <!-- Total Gaji -->
                <div class="mb-3">

                    <label class="form-label">
                        Total Gaji
                    </label>

                    <input
                        type="text"
                        id="total_gaji"
                        class="form-control"
                        value="0"
                        readonly
                    >

                </div>

                <!-- Tombol -->
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan
                </button>

                <a
                    href="/penggajian"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- AJAX -->
<script>

    /**
     * Ketika pilih karyawan
     */
    $('#karyawan_id').change(function(){

        // Ambil ID
        let id = $(this).val();

        /**
         * Jika kosong
         */
        if(id == ''){

            $('#gaji_pokok').val(0);
            $('#tunjangan').val(0);
            $('#potongan').val(0);
            $('#uang_lembur').val(0);
            $('#total_gaji').val(0);

            return;
        }

        /**
         * AJAX
         */
        $.ajax({

            url: '/get-gaji/' + id,

            type: 'GET',

            success: function(response){

                // Isi data
                $('#gaji_pokok')
                    .val(response.gaji_pokok);

                $('#tunjangan')
                    .val(response.tunjangan);

                $('#potongan')
                    .val(response.potongan);

                // Default uang lembur
                let uang_lembur = 0;

                $('#uang_lembur')
                    .val(uang_lembur);

                // Hitung total
                let total =
                    parseInt(response.gaji_pokok)
                    +
                    parseInt(response.tunjangan)
                    +
                    parseInt(uang_lembur)
                    -
                    parseInt(response.potongan);

                // Tampilkan total
                $('#total_gaji')
                    .val(total);
            }
        });

    });

    /**
     * Ketika jam lembur berubah
     */
    $('#jam_lembur').keyup(function(){

        // Ambil jam
        let jam =
            parseInt($(this).val()) || 0;

        // Hitung uang lembur
        let uang_lembur =
            jam * 50000;

        // Tampilkan uang lembur
        $('#uang_lembur')
            .val(uang_lembur);

        // Ambil data
        let gaji_pokok =
            parseInt($('#gaji_pokok').val()) || 0;

        let tunjangan =
            parseInt($('#tunjangan').val()) || 0;

        let potongan =
            parseInt($('#potongan').val()) || 0;

        // Hitung total
        let total =
            gaji_pokok
            +
            tunjangan
            +
            uang_lembur
            -
            potongan;

        // Tampilkan total
        $('#total_gaji')
            .val(total);

    });

</script>

@endsection