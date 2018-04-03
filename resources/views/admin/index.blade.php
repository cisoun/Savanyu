@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card" >
            <!--img class="card-img-top" src="..." alt="Card image cap"-->
            <div class="card-body">
                <h5 class="card-title">Articles</h5>
                <!--p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p-->
                <a href="{{ url('admin/new')}}" class="btn btn-primary">Ajouter un article</a>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
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
