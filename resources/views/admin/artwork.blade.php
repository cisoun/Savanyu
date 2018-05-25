<?php 
    $buttonTitle = $artwork->id !== null ? 'Mettre à jour' : 'Ajouter';
    $alert = $artwork->id !== null ? 'mise à jour' : 'enregistrée';
?>
@extends('layouts.admin')
@section('navbar')
<div class="text-right">
    <a class="btn btn-link text-white" href="{{ route('admin.index') }}">« Revenir au menu</a>
    <button class="btn btn-primary" type="button">{{ $buttonTitle }}</button>
</div>
@endsection

@section('content')
<!--

https://stackoverflow.com/questions/22844022/laravel-use-same-form-for-create-and-edit/22847292

-->
<template id="alert-success">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Chouette !</strong> L'oeuvre a bien été {{ $alert }}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
</template>

<template id="alert-error">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Oups !</strong> Quelque chose n'est pas juste...
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
</template>


<form id="form-artwork">
    
    <input type="hidden" id="id" name="id" value="{{ $artwork->id }}" />
    
    <div class="form-group row">                
        <label for="title" class="col-sm-2 col-form-label text-right">Titre</label>
        <div class="col-sm-8">
            <input class="form-control"
                name="title"
                placeholder="Titre de l'oeuvre"
                type="text"
                value="{{ $artwork->title }}"
                required>
            <small data-for="title" class="form-text text-danger d-none">Ce titre est déjà pris.</small>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label text-right">Description</label>
        <div class="col-sm-8">
            <textarea id="description" class="form-control" name="description" rows="3" value="test">{{ $artwork->description }}</textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label text-right">Catégorie</label>
        <div class="col-sm-8">
            <select class="dropdown form-control" id="category" name="category" value="{{ $artwork->category }}">
                <option value="0">Peinture</option>
                <option value="1">Vidéo</option>
                <option value="2">Sculpture</option>
                <option value="3">Photographie</option>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label text-right">Type</label>
        <div class="col-sm-8">
            <select class="dropdown form-control" id="type" name="type" value="{{ $artwork->type }}">
                <option value="0">Image unique</option>
                <option value="1">Galerie</option>
            </select>
        </div>
    </div>
    
    <div id="columns-row" class="form-group row">
        <label for="type" class="col-sm-2 col-form-label text-right">Colonnes</label>
        <div class="col-sm-8">
            <input class="form-control" type="number" name="columns" min="1" max="20" value="{{ $artwork->columns }}"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label text-right">Texte</label>
        <div class="col-sm-8">
            <div class="btn-toolbar" role="toolbar" data-role="editor-toolbar" data-target="#editor">
                
                <div class="btn-group mr-2" role="group">
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="oi oi-text"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" data-edit="fontSize 5"><font size="5">Grand</font></a>
                            <a class="dropdown-item" data-edit="fontSize 3"><font size="3">Normal</font></a>
                            <a class="dropdown-item" data-edit="fontSize 1"><font size="1">Petit</font></a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-edit="bold" ><span class="oi oi-bold"></span></button>
                    <button type="button" class="btn btn-secondary" data-edit="italic"><span class="oi oi-italic"></span></button>
                    <button type="button" class="btn btn-secondary" data-edit="underline"><span class="oi oi-underline"></span></button>
                </div>
                
                <div class="btn-group  mr-2" role="group">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" title="Hyperlink">
                            <span class="oi oi-link-intact"></span>
                        </button>
                        <div class="dropdown-menu">
                            <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                            <button class="btn" type="button">Add</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-edit="unlink" title="Enlever Hyperlink"><span class="oi oi-link-broken"></span></button>
                </div>
            </div>
            
            <div id="editor" class="form-control"></div>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="dropzone" class="col-sm-2 col-form-label text-right">Images</label>
        <div class="col-sm-8">
            <div id="dropzone-form" class="form-control">
                <div id="dropzone-template" style="display:none">
                    <div class="card dz-preview dz-file-preview">
                        <img class="card-img-top" data-dz-thumbnail alt="Card image cap">
                        <div class="dz-preview-infos">
                            <div class="card-title dz-filename float-left"><span data-dz-name></span></div>
                            <button data-dz-remove class="btn btn-danger btn-sm cancel float-right"><span class="oi oi-trash"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <small class="form-text text-muted">
                Clique ou glisse des images dans le rectangle pour les rajouter.<br>
                Déplace les images afin de les ordonner.
            </small>
        </div>
    </div>
    
    <div class="form-group row">
        <hr/>
        <div class="col-sm-8 text-right">
            <a class="btn" href="{{ route('admin.index') }}">« Revenir au menu</a>
            <button type="submit" class="btn btn-primary">{{ $buttonTitle }}</button>
        </div>
        <div class="col-sm-2"/>
    </div>
    
</form>

@endsection
@section('js')
<script>    
    var artwork = {!! json_encode($artwork->toArray()) !!};
</script>

<script src="{{ url('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('public/js/jquery.hotkeys.js') }}"></script>
<script src="{{ url('public/js/bootstrap-wysiwyg.js') }}"></script>
<script src="{{ url('public/js/admin/dropzone.js') }}"></script>
<script src="{{ url('public/js/admin/artwork.js') }}" type="module"></script>
@endsection
