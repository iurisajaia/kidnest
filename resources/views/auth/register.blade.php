@extends('layouts.app')

@section('content')
    @include('components.auth.layout', ['form' => view('components.auth.forms.register', ['id' => $id])])
@endsection
