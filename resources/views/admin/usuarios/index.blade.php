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
                            <a href="javascript:void()" class="btn btn-default" data-toggle="modal" data-target="#addReg">
                                <i class="fa fa-fw fa-plus"></i> Cadastrar Novo
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lista as $ln)
                            <tr>
                                <td>{{ $ln->name }}</td>
                                <td>{{ $ln->email }}</td>
                                <td>
                                    <a href="{{ route('usuarios.show', $ln->id) }}" class="btn btn-sm btn-info">
                                        <i class="fa fw fa-edit"></i>
                                    </a>
                                    @if(Auth::user()->id !== $ln->id)
                                    <a href="javascript:void()" title="Deletar usuário" class="btn btn-sm btn-danger" onclick="delReg('{{ $ln->id }}', '{{ $ln->name }}')">
                                        <i class="fa fw fa-trash"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Não há registros cadastrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="addReg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('usuarios.store') }}" method="post">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="delReg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('usuarios.delete') }}" method="post">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deletar Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <b>ATENÇÃO!</b> Deseja realmente deletar o usuário <b class="nUser"></b>?
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Confirmar exclusão</button>
          <input type="hidden" name="idReg" class="idReg">
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('css')
@stop

@section('js')
<script>
    function delReg(id, name) {
        $('#delReg').modal('show');
        $('.nUser').html(name);
        $('.idReg').val(id);
    }
</script>
@stop
