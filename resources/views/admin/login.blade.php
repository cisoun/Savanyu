@extends('layouts.admin')

@section('content')
<form method="post" action="{{ url('admin/login') }}">
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Combien vaut {{ $a }} + {{ $b }} ?</label>
        <input type="number" class="form-control" name="sum" aria-describedby="sum" placeholder="Somme...">
        <small class="form-text text-muted">Ceci permet de vérifier si tu es bien un humain.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
