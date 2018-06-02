@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card" >
            <div class="card-header d-flex justify-content-between">
                <div class="card-title-with-button"><h5>Articles</h5></div>
                <a href="{{ url('admin/new')}}" class="btn btn-primary">Ajouter</a>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($artworks as $artwork)
                <li class="list-group-item">
                    {{ $artwork->title }}
                    <span class="list-actions float-right">
                        <a href="{{ url('admin/' . $artwork->id . '/edit')}}" class="btn btn-sm btn-secondary"><span class="oi oi-pencil"></span></a>
                        <a href="{{ url('admin/' . $artwork->id . '/destroy')}}" class="btn btn-sm btn-danger"><span class="oi oi-x"></span></a>
                    </span>
                </li>
                @endforeach
                @if (count($artworks) == 0)
                <div class="card-empty">
                    Il n'y a aucune oeuvre pour le moment...
                </div>
                @endif
            </ul>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Biographie</h5>
                <a href="#" class="btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>
@endsection
