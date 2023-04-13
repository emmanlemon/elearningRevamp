<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
    <link rel="stylesheet" style="text/css" href="{{ url('css/adminExtension.css') }}">
    <title>Teacher Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
@extends('components.molecule.sideBarNavigationTeacher')
@section('sideBarNavigation')
<section class="home-section" style="background-image: url('https://wallpaperaccess.com/full/1426869.jpg'); background-size: cover;">
    <div class="text">Teacher Dashboard</div>

    <div class="row g-6 mb-6">
        <h2>Master List</h2>
        <div class="col-xl-3 col-sm-6 col-12" >
            <div class="card shadow border-0" style="background-color: rgb(215, 215, 255);">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                <i class='bx bx-user' ></i>
                                Pupils</span>
                            <span class="h3 font-bold mb-0">{{ $students->count() }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="bi bi-credit-card"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                        <a href="{{ route('page' , 'faculty') }}" style="text-decoration:none;">
                        <span class="text-nowrap text-xs text-muted">
                        <i class='bx bxs-down-arrow-square'></i> More Info</span>                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0" style="background-color: rgb(248, 255, 215);">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                <i class='bx bxs-book-alt'></i>Lecture</span>
                            <span class="h3 font-bold mb-0">{{ $lectures->count() }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                        <a href="{{ route('page' , 'student') }}" style="text-decoration:none;">
                        <span class="text-nowrap text-xs text-muted">
                        <i class='bx bxs-down-arrow-square'></i> More Info</span>                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0" style="background-color: rgb(255, 215, 215);">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                <i class='bx bx-book-alt'></i>Lesson</span>
                            <span class="h3 font-bold mb-0">{{ $lessons->count() }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                <i class="bi bi-clock-history"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                        <a href="{{ route('page' , 'student') }}" style="text-decoration:none;">
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
