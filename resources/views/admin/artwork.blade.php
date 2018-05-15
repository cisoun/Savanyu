@extends('layouts.admin')
@section('navbar')
<button class="btn btn-outline-primary" type="button">Ajouter l'oeuvre</button>
@endsection

@section('content')
<form id="form-artwork">

    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Titre</label>
        <div class="col-sm-10">
            <input id="title" name="title" type="text" class="form-control" aria-describedby="title" placeholder="Titre de l'oeuvre" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea id="description" class="form-control" name="description" rows="3"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label">Catégorie</label>
        <div class="col-sm-10">
            <select class="dropdown form-control" id="category" name="category">
                <option value="0">Peinture</option>
                <option value="1">Vidéo</option>
                <option value="2">Sculpture</option>
                <option value="3">Photographie</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-10">
            <select class="dropdown form-control" id="type" name="type">
                <option value="0">Image unique</option>
                <option value="1">Galerie</option>
            </select>
        </div>
    </div>
    
    <div id="columns-row" class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Colonnes</label>
        <div class="col-sm-10">
            <input class="form-control" type="number" name="columns" min="1" max="20"/>
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Texte</label>
        <div class="col-sm-10">
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
        <label for="dropzone" class="col-sm-2 col-form-label">Images</label>
        <div class="col-sm-10">
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
        <div class="float-right">
            <a class="btn" href="{{ route('admin.index') }}">« Revenir au menu</a>
            <button type="submit" class="btn btn-primary">Ajouter l'oeuvre</button>
        </div>
    </div>

</form>
@endsection
@section('js')
<script src="{{ url('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('public/js/jquery.hotkeys.js') }}"></script>
<script src="{{ url('public/js/bootstrap-wysiwyg.js') }}"></script>
<script src="{{ url('public/js/admin/dropzone.js') }}"></script>
<script src="{{ url('public/js/admin/artwork.js') }}"></script>
@endsection
