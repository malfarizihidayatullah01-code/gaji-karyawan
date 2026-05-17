@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="text-primary">
            Edit Penggajian
        </h3>

        <a
            href="/penggajian"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </div>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card">

        <div class="card-body">

            <form
                action="/penggajian/{{ $penggajian->id }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <!-- Karyawan -->
                <div class="mb-3">

                    <label class="form-label">
                        Karyawan
                    </label>

                    <select
                        name="karyawan_id"
                        class="form-control"
                    >

                        @foreach($karyawans as $karyawan)

                            <option
                                value="{{ $karyawan->id }}"
                                {{
                                    $penggajian->karyawan_id
                                    == $karyawan->id
                                    ? 'selected'
                                    : ''
                                }}
                            >

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
                        value="{{ $penggajian->bulan }}"
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
                        value="{{ $penggajian->karyawan->jabatan->gaji_pokok }}"
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
                        value="{{ $penggajian->karyawan->jabatan->tunjangan }}"
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
                        value="{{ $penggajian->jam_lembur }}"
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
                        value="{{ $penggajian->uang_lembur }}"
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
                        value="{{ $penggajian->potongan }}"
                        readonly
                    >

                </div>

                <!-- Total -->
                <div class="mb-3">

                    <label class="form-label">
                        Total Gaji
                    </label>

                    <input
                        type="text"
                        id="total_gaji"
                        class="form-control"
                        value="{{ $penggajian->total_gaji }}"
                        readonly
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update
                </button>

            </form>

        </div>

    </div>

</div>

<!-- JQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>

    const gaji_pokok =
        "{{ $penggajian->karyawan->jabatan->gaji_pokok }}";

    const tunjangan =
        "{{ $penggajian->karyawan->jabatan->tunjangan }}";

    $('#jam_lembur').on(
        'keyup change',
        function(){

            let jam =
                parseInt($(this).val()) || 0;

            let uang_lembur = 0;

            if(jam > 0){

                uang_lembur =
                    jam * 50000;

            }else{

                uang_lembur = 0;
            }

            $('#uang_lembur')
                .val(uang_lembur);

            let potongan =
                parseInt(
                    $('#potongan').val()
                ) || 0;

            let total =
                parseInt(gaji_pokok)
                +
                parseInt(tunjangan)
                +
                parseInt(uang_lembur)
                -
                parseInt(potongan);

            $('#total_gaji')
                .val(total);

        }
    );

</script>

@endsection