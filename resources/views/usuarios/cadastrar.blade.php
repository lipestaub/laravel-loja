@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Cadastrar usuários</h3>
    <br>
</div>
@if (Session::has('alert-error'))
    <div class="align-center">
        <span class="align-center">Erro: {{ Session::get('alert-error') }}</span>
    </div>
    <br>
@endif
<div class="panel-body">
    {{ Form::model($usuario, ['url' => 'usuarios/salvar', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('user_type', 'Tipo de usuário', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('user_type', array(0 => 'Selecione...', 1 => 'Cliente', 2 => 'Administrador'), null) }}
            </div>
            <br>
            {{ Form::label('name', 'Nome', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('document', 'Documento', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('document', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('phone_number', 'Celular', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('phone_number', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('email', 'E-mail', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::email('email', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('password', 'Senha', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::password('password', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('notify', 'Deseja receber notificações?', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('notify', array(0 => 'Não', 1 => 'Sim'), null) }}
            </div>
            <br>
            {{ Form::label('chat_id', 'Chat Id', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('chat_id', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Salvar
                </button>
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection