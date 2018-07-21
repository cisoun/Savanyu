@extends('layouts.app')

@section('title', 'Peinture')

@section('content')

    @component('components/scrollable')
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
    @endcomponent

    @component('components/navigator')
    @endcomponent

@endsection

@section('js')
<script>    
    const paintings = {!! json_encode($paintings->toArray()) !!};
</script>
    <script src="{{ url('public/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('public/js/peinture.js') }}" type="module"></script>
@endsection
