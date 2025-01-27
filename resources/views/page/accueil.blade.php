
@extends('main')


@section('content')
@if(session('success'))
    <div class="alert alert-success texte-center">
        {{ session('success') }}
    </div>
@endif
    <!-- Contenu principal -->
    <div class="content">
        <div class="p-4 mt-20">
            <h1 class="text-2xl font-bold">Welcome to my dashboard!</h1>
        </div>
    </div>
@endsection
