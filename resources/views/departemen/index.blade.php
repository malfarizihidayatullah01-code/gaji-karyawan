@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="text-primary">
            Data Departemen
        </h3>

        <a
            href="/departemen/create"
            class="btn btn-primary"
        >
            Tambah Departemen
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

                        <th>Nama Departemen</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($departemens as $departemen)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $departemen->nama_departemen }}
                        </td>

                        <td>

                            <a
                                href="/departemen/{{ $departemen->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="/departemen/{{ $departemen->id }}"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
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