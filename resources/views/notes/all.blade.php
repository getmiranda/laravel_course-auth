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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                <th scope="row">Action</th>
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
