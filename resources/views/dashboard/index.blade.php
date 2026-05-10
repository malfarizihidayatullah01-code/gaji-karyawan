@extends('layouts.app')

@section('content')

<style>

    body{

        background: #f4f7fb;
    }

    .dashboard-title{

        font-size: 40px;

        font-weight: 700;

        color: #1e293b;

        margin-bottom: 35px;
    }

    .dashboard-card{

        border: none;

        border-radius: 22px;

        padding: 30px;

        color: white;

        position: relative;

        overflow: hidden;

        transition: 0.3s;

        min-height: 210px;

        background:
            linear-gradient(
                135deg,
                #4f46e5,
                #6366f1
            );

        box-shadow:
            0 10px 30px rgba(99,102,241,0.25);
    }

    .dashboard-card:hover{

        transform: translateY(-8px);

        box-shadow:
            0 18px 35px rgba(99,102,241,0.35);
    }

    .dashboard-card h5{

        font-size: 18px;

        font-weight: 500;

        opacity: 0.9;

        margin-bottom: 20px;
    }

    .dashboard-card h1{

        font-size: 48px;

        font-weight: 700;
    }

    .dashboard-card .icon{

        position: absolute;

        right: 25px;

        bottom: 20px;

        font-size: 75px;

        color: white;

        opacity: 0.25;
    }

    .dashboard-card::before{

        content: '';

        position: absolute;

        width: 180px;

        height: 180px;

        background: rgba(255,255,255,0.08);

        border-radius: 50%;

        top: -60px;

        right: -60px;
    }

    .salary-card{

        min-height: 240px;
    }

    .salary-card h1{

        font-size: 52px;
    }

</style>

<h1 class="dashboard-title">
    Dashboard
</h1>

<div class="row g-4">

    <!-- Total Karyawan -->
    <div class="col-lg-4 col-md-6">

        <div class="dashboard-card">

            <h5>
                Total Karyawan
            </h5>

            <h1>
                {{ $total_karyawan }}
            </h1>

            <i class="bi bi-people-fill icon"></i>

        </div>

    </div>

    <!-- Total Jabatan -->
    <div class="col-lg-4 col-md-6">

        <div class="dashboard-card">

            <h5>
                Total Jabatan
            </h5>

            <h1>
                {{ $total_jabatan }}
            </h1>

            <i class="bi bi-briefcase-fill icon"></i>

        </div>

    </div>

    <!-- Total Departemen -->
    <div class="col-lg-4 col-md-12">

        <div class="dashboard-card">

            <h5>
                Total Departemen
            </h5>

            <h1>
                {{ $total_departemen }}
            </h1>

            <i class="bi bi-building-fill icon"></i>

        </div>

    </div>

    <!-- Total Penggajian -->
    <div class="col-12">

        <div class="dashboard-card salary-card">

            <h5>
                Total Penggajian
            </h5>

            <h1>

                Rp
                {{ number_format(
                    $total_penggajian,
                    0,
                    ',',
                    '.'
                ) }}

            </h1>

            <i class="bi bi-cash-stack icon"></i>

        </div>

    </div>

</div>

@endsection