@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="text-success mb-3">
        Edit Departemen
    </h3>

    <div class="card">

        <div class="card-body">

            <form
                action="/departemen/{{ $departemen->id }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>
                        Nama Departemen
                    </label>

                    <input
                        type="text"
                        name="nama_departemen"
                        class="form-control"
                        value="{{ $departemen->nama_departemen }}"
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update
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