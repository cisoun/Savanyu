@extends('layouts.app')

@section('title', 'Peinture')

@section('content')
<div class="peinture">
    <div class="grid">
        <!-- width of .grid-sizer used for columnWidth -->
        <div class="item">
            <img src="{{ url('img/TMLondon.jpg') }}" />
            <p>T.M SHOW IN LONDON</p>
            Huile, colle et craie sur bois, 100 x 86.3 cm, 2014
        </div>
        <div class="item">
            <img src="{{ url('img/eating-lunch.jpg') }}" />
        </div>
        <div class="item">
            <p>VIEW FROM OUR HOTEL ROOM</p>
            Huile, colle et craie sur bois, 100 x 86.3 cm, 2014
            <img src="{{ url('img/view-from.jpg') }}" />
        </div>
        <div class="item">
            <img src="{{ url('img/my-room.jpg') }}" />
        </div>
        <div class="item">
            <img src="{{ url('img/my-bathroom.jpg') }}" />
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ url('js/masonry.min.js') }}"></script>
    <script src="{{ url('js/peinture.js') }}"></script>
@endsection
