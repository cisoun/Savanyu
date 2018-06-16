@extends('layouts.app')

@section('title', 'Peinture')

@section('content')
<div class="scrollable">
    <div class="peinture">
        <div class="grid">
            @foreach ($paintings as $painting)
                <a href="#" class="grid-item" data-artwork="{{ $painting->id }}">
                    <img src="{{ upload($painting->thumbnail->name) }}" />
                    <p>{{ $painting->title }}</p>
                    {{ $painting->description }}
                </a>
            @endforeach
        </div>
    </div>
</div>
<div class="navigator">
    <div class="arrow"></div>
    <div class="arrow arrow-reverse"></div>
</div>

<template>
<div class="popup">
    <div class="popup-content">
        <a href="#" class="popup-close"></a>
        <img class="popup-image" src="" />
    </div>
</div>
</template>
@endsection

@section('js')
    <script src="{{ url('public/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/peinture.js') }}"></script>
@endsection
