@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-success mb-3">
        Edit Absensi
    </h3>

    <div class="card">

        <div class="card-body">

            <form
                action="/absensi/{{ $absensi->id }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>
                        Karyawan
                    </label>

                    <select
                        name="karyawan_id"
                        class="form-control"
                    >

                        @foreach($karyawans as $karyawan)

                            <option
                                value="{{ $karyawan->id }}"

                                @if(
                                    $karyawan->id
                                    ==
                                    $absensi->karyawan_id
                                )
                                    selected
                                @endif
                            >

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
                        value="{{ $absensi->tanggal }}"
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

                        <option
                            value="Hadir"

                            @if($absensi->status == 'Hadir')
                                selected
                            @endif
                        >
                            Hadir
                        </option>

                        <option
                            value="Izin"

                            @if($absensi->status == 'Izin')
                                selected
                            @endif
                        >
                            Izin
                        </option>

                        <option
                            value="Sakit"

                            @if($absensi->status == 'Sakit')
                                selected
                            @endif
                        >
                            Sakit
                        </option>

                        <option
                            value="Alpha"

                            @if($absensi->status == 'Alpha')
                                selected
                            @endif
                        >
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
                        value="{{ $absensi->jam_masuk }}"
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
                        value="{{ $absensi->jam_keluar }}"
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        class="form-control"
                    >{{ $absensi->keterangan }}</textarea>

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update
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