@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-success mb-3">
        Edit Karyawan
    </h3>

    <div class="card">

        <div class="card-body">

            <form
                action="/karyawan/{{ $karyawan->id }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>
                        Nama Karyawan
                    </label>

                    <input
                        type="text"
                        name="nama_karyawan"
                        class="form-control"
                        value="{{ $karyawan->nama_karyawan }}"
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

                        @foreach($jabatans as $jabatan)

                            <option
                                value="{{ $jabatan->id }}"

                                @if(
                                    $jabatan->id
                                    ==
                                    $karyawan->jabatan_id
                                )
                                    selected
                                @endif
                            >

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

                        <option
                            value="L"

                            @if($karyawan->jenis_kelamin == 'L')
                                selected
                            @endif
                        >
                            Laki-Laki
                        </option>

                        <option
                            value="P"

                            @if($karyawan->jenis_kelamin == 'P')
                                selected
                            @endif
                        >
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
                        value="{{ $karyawan->email }}"
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
                        value="{{ $karyawan->no_hp }}"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                    >{{ $karyawan->alamat }}</textarea>

                </div>

                <div class="mb-3">

                    <label>
                        Tanggal Masuk
                    </label>

                    <input
                        type="date"
                        name="tanggal_masuk"
                        class="form-control"
                        value="{{ $karyawan->tanggal_masuk }}"
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update
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