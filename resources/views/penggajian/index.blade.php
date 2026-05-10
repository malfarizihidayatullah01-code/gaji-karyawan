@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between mb-3">

        <h3 class="text-primary">
            Data Penggajian
        </h3>

        <a
            href="/penggajian/create"
            class="btn btn-primary"
        >
            Tambah Penggajian
        </a>

    </div>

    <!-- Alert -->
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <!-- Card -->
    <div class="card">

        <div class="card-body">

            <!-- Table -->
            <table class="table table-hover">

                <thead class="table-primary">

                    <tr>

                        <th>No</th>

                        <th>Nama Karyawan</th>

                        <th>Jabatan</th>

                        <th>Bulan</th>

                        <th>Jam Lembur</th>

                        <th>Uang Lembur</th>

                        <th>Potongan</th>

                        <th>Total Gaji</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($penggajians as $penggajian)

                    <tr>

                        <!-- Nomor -->
                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <!-- Nama -->
                        <td>

                            {{ $penggajian
                                ->karyawan
                                ->nama_karyawan }}

                        </td>

                        <!-- Jabatan -->
                        <td>

                            {{ $penggajian
                                ->karyawan
                                ->jabatan
                                ->nama_jabatan }}

                        </td>

                        <!-- Bulan -->
                        <td>

                            {{ $penggajian->bulan }}

                        </td>

                        <!-- Jam lembur -->
                        <td>

                            {{ $penggajian->jam_lembur }}

                            Jam

                        </td>

                        <!-- Uang lembur -->
                        <td>

                            Rp.
                            {{ number_format(
                                $penggajian->uang_lembur,
                                0,
                                ',',
                                '.'
                            ) }}

                        </td>

                        <!-- Potongan -->
                        <td>

                            Rp.
                            {{ number_format(
                                $penggajian->potongan,
                                0,
                                ',',
                                '.'
                            ) }}

                        </td>

                        <!-- Total -->
                        <td>

                            <strong>

                                Rp.
                                {{ number_format(
                                    $penggajian->total_gaji,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </td>

                        <!-- Status -->
                        <td>

                            @if($penggajian->potongan > 0)

                                <span class="badge bg-danger">

                                    Ada Potongan

                                </span>

                            @else

                                <span class="badge bg-success">

                                    Tidak Ada Potongan

                                </span>

                            @endif

                        </td>

                        <!-- Aksi -->
                        <td>

                            <!-- Edit -->
                            <a
                                href="/penggajian/{{ $penggajian->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <!-- Hapus -->
                            <form
                                action="/penggajian/{{ $penggajian->id }}"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')"
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