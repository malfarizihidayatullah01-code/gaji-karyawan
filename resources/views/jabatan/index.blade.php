@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div
        class="
            d-flex
            justify-content-between
            align-items-center
            mb-4
        "
    >

        <h2 class="fw-bold text-primary">
            Data Jabatan
        </h2>

        <a
            href="/jabatan/create"
            class="btn btn-primary"
        >

            <i class="bi bi-plus-circle"></i>

            Tambah Jabatan

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

            <div class="table-responsive">

                <table
                    class="
                        table
                        table-hover
                        align-middle
                    "
                >

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Departemen</th>

                            <th>Nama Jabatan</th>

                            <th>Gaji Pokok</th>

                            <th>Tunjangan</th>

                            <th width="150">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($jabatans as $jabatan)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $jabatan
                                    ->departemen
                                    ->nama_departemen }}

                            </td>

                            <td>

                                {{ $jabatan
                                    ->nama_jabatan }}

                            </td>

                            <td>

                                Rp
                                {{
                                    number_format(
                                        $jabatan
                                        ->gaji_pokok,
                                        0,
                                        ',',
                                        '.'
                                    )
                                }}

                            </td>

                            <td>

                                Rp
                                {{
                                    number_format(
                                        $jabatan
                                        ->tunjangan,
                                        0,
                                        ',',
                                        '.'
                                    )
                                }}

                            </td>

                            <td>

                                <!-- Edit -->
                                <a
                                    href="/jabatan/{{ $jabatan->id }}/edit"
                                    class="
                                        btn
                                        btn-warning
                                        btn-sm
                                    "
                                >

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <!-- Delete -->
                                <form
                                    action="/jabatan/{{ $jabatan->id }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="
                                            btn
                                            btn-danger
                                            btn-sm
                                        "

                                        onclick="
                                            return confirm(
                                                'Yakin hapus data?'
                                            )
                                        "
                                    >

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center"
                            >

                                Data jabatan belum ada

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection