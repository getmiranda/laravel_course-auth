@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between aling-items-center">
                    <span>List of notes for {{ auth()->user()->name }}</span>
                    <a href="/notes/create" class="btn btn-primary btn-sm">New</a>
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
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                        </div>
                    @endif
                    {{-- Fin Bandera para notificar --}}

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_notes as $note)
                            <tr>
                                <th scope="row">{{ $note->id }}</th>
                                <th scope="row">{{ $note->nombre }}</th>
                                <th scope="row">{{ $note->descripcion }}</th>
                                <th scope="row">
                                    {{-- Boton editar --}}
                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    {{-- Boton eliminar --}}
                                    <form action="{{ route('notes.destroy', $note->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>          
                                    </form>
                                    {{-- Fin Boton eliminar --}}

                                </th>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{ $all_notes->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
