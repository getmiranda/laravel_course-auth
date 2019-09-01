@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between aling-items-center">
                    <span>Update a note</span>
                    <a href="/notes" class="btn btn-primary btn-sm">back</a>
                </div>

                <div class="card-body">

                    @if (session()->get('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                        </div>
                    @endif

                    {{-- Bandera para notificar --}}
                    @if (session()->get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                        </div>
                    @endif
                    {{-- Fin Bandera para notificar --}}

                    {{-- Todos los errores sin personalizar --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                        </div>
                        @endforeach
                    @endif

                    <form action="{{ route('notes.update', $note->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="text" name="name" placeholder="Name" class="form-control mb-2" value="{{ $note->nombre }}">
                        <input type="text" name="description" placeholder="Description" class="form-control mb-2" value="{{ $note->descripcion }}">
                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
