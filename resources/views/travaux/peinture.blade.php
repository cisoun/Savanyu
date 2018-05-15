@extends('layouts.app')

@section('title', 'Peinture')
@section('css')
    <link href="{{ url('public/css/peinture.min.css') }}" type="text/css" rel="stylesheet">
@endsection

@section('content')
<div class="scrollable">
<div class="peinture">
    <div class="grid">
        @foreach ($paintings as $painting)
            <div class="grid-item">
                <img src="{{ upload($painting->thumbnail->name) }}" />
                <p>{{ $painting->title }}</p>
                {{ $painting->description }}
            </div>
        @endforeach
        <!--div class="grid-item">
            <img src="{{ url('public/img/TMLondon.jpg') }}" />
            <p>T.M SHOW IN LONDON</p>
            Huile, colle et craie sur bois, 100 x 86.3 cm, 2014
        </div>
        <div class="grid-item">
            <img src="{{ url('public/img/eating-lunch.jpg') }}" />
        </div>
        <div class="grid-item">
            <img src="{{ url('public/img/view-from.jpg') }}" />
            <p>VIEW FROM OUR HOTEL ROOM</p>
            Huile, colle et craie sur bois, 100 x 86.3 cm, 2014
        </div>
        <div class="grid-item">
            <img src="{{ url('public/img/my-room.jpg') }}" />
        </div>
        <div class="grid-item">
            <img src="{{ url('public/img/my-bathroom.jpg') }}" />
        </div-->
    </div>
</div>
</div>
<div class="navigator">
    <div class="arrow"></div>
    <div class="arrow arrow-reverse"></div>
</div>
@endsection

@section('js')
    <script src="{{ url('public/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/peinture.js') }}"></script>
@endsection
