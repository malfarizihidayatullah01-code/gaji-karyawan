@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-primary mb-3">
        Tambah Absensi
    </h3>

    <div class="card">

        <div class="card-body">

            <form
                action="/absensi"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label>
                        Karyawan
                    </label>

                    <select
                        name="karyawan_id"
                        class="form-control"
                    >

                        <option value="">
                            -- Pilih --
                        </option>

                        @foreach($karyawans as $karyawan)

                            <option value="{{ $karyawan->id }}">

                                {{ $karyawan->nama_karyawan }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-control"
                    >

                        <option value="Hadir">
                            Hadir
                        </option>

                        <option value="Izin">
                            Izin
                        </option>

                        <option value="Sakit">
                            Sakit
                        </option>

                        <option value="Alpha">
                            Alpha
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Jam Masuk
                    </label>

                    <input
                        type="time"
                        name="jam_masuk"
                        class="form-control"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Jam Keluar
                    </label>

                    <input
                        type="time"
                        name="jam_keluar"
                        class="form-control"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        class="form-control"
                    ></textarea>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan
                </button>

                <a
                    href="/absensi"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection