@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.alerts')
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Usuários cadastrados no sistema.
                        </div>
                        <div class="col-md-6 text-right">

                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Senha</label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('usuarios') }}" class="btn btn-sm btn-default">Voltar</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('css')
@stop

@section('js')
@stop
