@extends('layouts.auth')
@section('user')
@if (count($files) > 0)
    <ul>
        @foreach ($files as $file)
            <li>
                <img src="{{ Storage::disk('s3')->url($file) }}" />
            </li>
        @endforeach
    </ul>

@else
    <p>No files uploaded yet.</p>
@endif
@endsection
