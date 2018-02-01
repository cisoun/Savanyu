@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
{{{ $page }}}
    <p>This is appended to the master sidebar.</p>
@endsection
