<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <link rel="stylesheet" style="text/css" href="{{ url('css/adminExtension.css') }}">
    <title>Admin Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
@extends('components.molecule.sideBarNavigation')
@section('sideBarNavigation')
<section class="home-section">
    <div class="text">Admin Dashboard</div>

    <div class="row g-6 mb-6">
        <h2>Master List</h2>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                <i class='bx bx-user' ></i>
                                Teachers</span>
                            <span class="h3 font-bold mb-0">{{ $teacher }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="bi bi-credit-card"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                        <a href="{{ route('admin.page' , 'faculty') }}" style="text-decoration:none;">
                        <span class="text-nowrap text-xs text-muted">
                        <i class='bx bxs-down-arrow-square'></i> More Info</span>                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Students</span>
                            <span class="h3 font-bold mb-0">{{ $student }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                        <a href="{{ route('admin.page' , 'student') }}" style="text-decoration:none;">
                        <span class="text-nowrap text-xs text-muted">
                        <i class='bx bxs-down-arrow-square'></i> More Info</span>                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Class</span>
                            <span class="h3 font-bold mb-0">3</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                        <a href="{{ route('admin.page' , 'class') }}" style="text-decoration:none;">
                        <span class="text-nowrap text-xs text-muted">
                        <i class='bx bxs-down-arrow-square'></i> More Info</span>                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<body>
</html>
