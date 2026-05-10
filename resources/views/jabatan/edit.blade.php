@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-success mb-3">
        Edit Jabatan
    </h3>

    <div class="card">

        <div class="card-body">

            <form
                action="/jabatan/{{ $jabatan->id }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <!-- Departemen -->
                <div class="mb-3">

                    <label>
                        Departemen
                    </label>

                    <select
                        name="departemen_id"
                        class="form-control"
                    >

                        @foreach($departemens as $departemen)

                            <option
                                value="{{ $departemen->id }}"

                                @if(
                                    $departemen->id
                                    ==
                                    $jabatan->departemen_id
                                )
                                    selected
                                @endif
                            >

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
                        value="{{ $jabatan->nama_jabatan }}"
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
                        value="{{ $jabatan->gaji_pokok }}"
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
                        value="{{ $jabatan->tunjangan }}"
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update
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