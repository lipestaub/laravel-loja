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

<div class="">
    {{ Form::model($usuario, ['url' => 'usuarios/salvar', 'method' => 'post']) }}
        <div class="">
            {{ Form::label('user_type', 'Tipo de usuário', ['class' => '']) }}
            <div class="">
                {{ Form::select('user_type', array(0 => 'Selecione...', 1 => 'Cliente', 2 => 'Administrador'), null, ['class' => 'form-select form-select-sm']) }}
            </div>
            <br>
            {{ Form::label('name', 'Nome', ['class' => '']) }}
            <div class="">
                {{ Form::text('name', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('document', 'Documento', ['class' => '']) }}
            <div class="">
                {{ Form::text('document', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('phone_number', 'Celular', ['class' => '']) }}
            <div class="">
                {{ Form::text('phone_number', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('email', 'E-mail', ['class' => '']) }}
            <div class="">
                {{ Form::email('email', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('password', 'Senha', ['class' => '']) }}
            <div class="">
                {{ Form::text('password', null, ['class' => 'form-control'])}}
            </div>
            <br>
            <div class="form-check">
                {{ Form::checkbox('notify', 1, null, ['class' => 'form-check-input']) }}
                {{ Form::label('notify', 'Deseja receber notificações?', ['class' => 'form-check-label']) }}
            </div>
            <br>
            {{ Form::label('chat_id', 'Chat Id', ['class' => '']) }}
            <div class="">
                {{ Form::text('chat_id', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
        </div>
        
        <div class="">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection