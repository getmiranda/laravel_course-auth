@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between aling-items-center">
                    <span>Add note</span>
                    <a href="/notes" class="btn btn-primary btn-sm">back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Bandera para notificar nueva nota --}}
                    @if (session('messagge'))
                        <div class="alert alert-success" role="alert">
                            {{ session('messagge') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                        </div>
                    @endif
                    {{-- Fin Bandera para notificar nueva nota --}}

                    <form action="/notes" method="POST">
                        @csrf

                        {{-- Validacion de campos vacios --}}
                        @if ($errors->has('name'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                Name is required!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->has('description'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                Description is required!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                </button>
                            </div>
                        @endif
                        {{-- Fin Validacion de campos vacios --}}

                        <input type="text" name="name" placeholder="Name" class="form-control mb-2">
                        <input type="text" name="description" placeholder="Description" class="form-control mb-2">
                        <button class="btn btn-primary btn-block" type="submit">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
