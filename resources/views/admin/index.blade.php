@extends('layouts.admin')

@section('content')
<div id="removeModal" class="modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer l'oeuvre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Es-tu sûr de vouloir supprimer <span id="removeModalTitle" class="font-weight-bold"></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
        <button type="button" class="btn btn-danger" onclick="removeArtwork()">Oui</button>
      </div>
    </div>
  </div>
</div>

<div class="alert alert-success fade" role="alert">
    <strong>Chouette !</strong> L'oeuvre a bien été supprimée.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

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
                        <!--a href="{{ url('admin/' . $artwork->id . '/destroy')}}" class="btn btn-sm btn-danger"><span class="oi oi-x"></span></a-->
                        <button class="btn btn-sm btn-danger" onclick="askToRemove({{ $artwork->id }})"><span class="oi oi-x"></span></button>
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

@section('js')
<script>    
    var artworks = {!! json_encode($artworks->toArray()) !!};
</script>
<script src="{{ url('public/js/admin/index.js') }}"></script>
@endsection
