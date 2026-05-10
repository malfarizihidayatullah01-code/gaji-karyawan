@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="text-primary">
            Data Absensi
        </h3>

        <a
            href="/absensi/create"
            class="btn btn-primary"
        >
            Tambah Absensi
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-hover">

                <thead class="table-primary">

                    <tr>

                        <th>No</th>
                        <th>Karyawan</th>
                        <th>Jabatan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($absensis as $absensi)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $absensi->karyawan->nama_karyawan }}
                        </td>

                        <td>
                            {{ $absensi->karyawan->jabatan->nama_jabatan }}
                        </td>

                        <td>
                            {{ $absensi->tanggal }}
                        </td>

                        <td>

                            @if($absensi->status == 'Hadir')

                                <span class="badge bg-success">
                                    Hadir
                                </span>

                            @elseif($absensi->status == 'Izin')

                                <span class="badge bg-warning">
                                    Izin
                                </span>

                            @elseif($absensi->status == 'Sakit')

                                <span class="badge bg-info">
                                    Sakit
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Alpha
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $absensi->jam_masuk }}
                        </td>

                        <td>
                            {{ $absensi->jam_keluar }}
                        </td>

                        <td>

                            <a
                                href="/absensi/{{ $absensi->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="/absensi/{{ $absensi->id }}"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')"
                                >
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection