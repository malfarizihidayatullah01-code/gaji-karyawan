@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-primary mb-3">
        Tambah Karyawan
    </h3>

    <div class="card">

        <div class="card-body">

            <form
                action="/karyawan"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label>
                        Nama Karyawan
                    </label>

                    <input
                        type="text"
                        name="nama_karyawan"
                        class="form-control"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Jabatan
                    </label>

                    <select
                        name="jabatan_id"
                        class="form-control"
                    >

                        <option value="">
                            -- Pilih --
                        </option>

                        @foreach($jabatans as $jabatan)

                            <option value="{{ $jabatan->id }}">

                                {{ $jabatan->nama_jabatan }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Jenis Kelamin
                    </label>

                    <select
                        name="jenis_kelamin"
                        class="form-control"
                    >

                        <option value="L">
                            Laki-Laki
                        </option>

                        <option value="P">
                            Perempuan
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        No HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                    ></textarea>

                </div>

                <div class="mb-3">

                    <label>
                        Tanggal Masuk
                    </label>

                    <input
                        type="date"
                        name="tanggal_masuk"
                        class="form-control"
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan
                </button>

                <a
                    href="/karyawan"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection