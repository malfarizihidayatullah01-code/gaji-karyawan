@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-primary mb-3">
        Tambah Jabatan
    </h3>

    <div class="card">

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    @foreach ($errors->all() as $error)

                        <div>{{ $error }}</div>

                    @endforeach

                </div>

            @endif

            <form action="/jabatan" method="POST">

                @csrf

                <!-- Departemen -->
                <div class="mb-3">

                    <label>
                        Departemen
                    </label>

                    <select
                        name="departemen_id"
                        class="form-control"
                    >

                        <option value="">
                            -- Pilih --
                        </option>

                        @foreach($departemens as $departemen)

                            <option value="{{ $departemen->id }}">

                                {{ $departemen->nama_departemen }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Jabatan -->
                <div class="mb-3">

                    <label>
                        Nama Jabatan
                    </label>

                    <input
                        type="text"
                        name="nama_jabatan"
                        class="form-control"
                    >

                </div>

                <!-- Gaji -->
                <div class="mb-3">

                    <label>
                        Gaji Pokok
                    </label>

                    <input
                        type="number"
                        name="gaji_pokok"
                        class="form-control"
                    >

                </div>

                <!-- Tunjangan -->
                <div class="mb-3">

                    <label>
                        Tunjangan
                    </label>

                    <input
                        type="number"
                        name="tunjangan"
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
                    href="/jabatan"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection