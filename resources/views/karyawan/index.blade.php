@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="text-primary">
            Data Karyawan
        </h3>

        <a
            href="/karyawan/create"
            class="btn btn-primary"
        >
            Tambah Karyawan
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($karyawans as $karyawan)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $karyawan->nama_karyawan }}
                        </td>

                        <td>
                            {{ $karyawan->jabatan->nama_jabatan }}
                        </td>

                        <td>
                            {{ $karyawan->jabatan->departemen->nama_departemen }}
                        </td>

                        <td>

                            @if($karyawan->jenis_kelamin == 'L')

                                Laki-Laki

                            @else

                                Perempuan

                            @endif

                        </td>

                        <td>
                            {{ $karyawan->email }}
                        </td>

                        <td>
                            {{ $karyawan->no_hp }}
                        </td>

                        <td>
                            {{ $karyawan->tanggal_masuk }}
                        </td>

                        <td>

                            <a
                                href="/karyawan/{{ $karyawan->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="/karyawan/{{ $karyawan->id }}"
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