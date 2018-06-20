@extends('layouts.app')

@section('title', 'Peinture')

@section('content')
<div class="scrollable">
    <div class="peinture">
        <div class="grid">
            @foreach ($paintings as $painting)
                <a href="#" class="grid-item" data-artwork="{{ $loop->index }}">
                    <img src="{{ upload($painting->thumbnail->name) }}" />
                    <div class="grid-item-infos">
                        <b>{{ $painting->title }}</b><br/>
                        {{ $painting->description }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
<div class="navigator">
    <div class="arrow"></div>
    <div class="arrow arrow-reverse"></div>
</div>

<template id="popupTemplate">
<div class="popup popup-close">
    <div class="popup-content">
        <a href="#" class="popup-cross popup-close"></a>
        <img class="popup-image" />
        <div class="popup-thumbnails">
        </div>
    </div>
</div>
</template>
@endsection

@section('js')
<script>    
    const paintings = {!! json_encode($paintings->toArray()) !!};
    //console.log(paintings);
</script>
    <script src="{{ url('public/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/peinture.js') }}"></script>
@endsection
