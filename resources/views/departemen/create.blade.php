@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-primary mb-3">
        Tambah Departemen
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

            <form
                action="/departemen"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label>
                        Nama Departemen
                    </label>

                    <input
                        type="text"
                        name="nama_departemen"
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
                    href="/departemen"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection