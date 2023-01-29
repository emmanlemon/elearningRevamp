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
@extends('components.molecule.sideBarNavigationTeacher')
@section('sideBarNavigation')
<section class="home-section">
    <div class="container">
        @foreach ($lecture as $lecture)
        <h2 class="text-capitalize">{{ $lecture->title }}</h2>
        <p>Created At: {{ date('F j, Y, g:i a', strtotime($lecture->created_at)) }} , {{ \Carbon\Carbon::parse($lecture->created_at)->diffForHumans() }}  </p>
        <video width="100%" height="600" controls>
            <source src="{{ URL::asset($lecture->path) }}" type="video/mp4">
        </video>
        <img src="{{ URL::asset($lecture->thumbnailImage) }}" style="height: 350px; width: 300px;" alt="" download>
        <p>{{ $lecture->file }}</p><a href="{{ URL::asset($lecture->file) }}" download><button class="btn btn-primary">Click Me to Download the File</button></a>
        @endforeach
    </div>
</section>
@endsection
<body>
</html>
