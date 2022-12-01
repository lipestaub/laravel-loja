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

<div>
    {{ Form::model($usuario, ['url' => 'usuarios/salvar', 'method' => 'post']) }}
        <div>
            <b>{{ Form::label('user_type', 'Tipo de usuário') }}</b>
            <div>
                {{ Form::select('user_type', array(0 => 'Selecione...', 1 => 'Cliente', 2 => 'Administrador'), null, ['class' => 'form-select form-select-sm']) }}
            </div>
            <br>
            <b>{{ Form::label('name', 'Nome') }}</b>
            <div>
                {{ Form::text('name', null, ['class' => 'form-control'])}}
            </div>
            <br>
            <b>{{ Form::label('document', 'Documento') }}</b>
            <div>
                {{ Form::text('document', null, ['class' => 'form-control'])}}
            </div>
            <br>
            <b>{{ Form::label('phone_number', 'Celular') }}</b>
            <div>
                {{ Form::text('phone_number', null, ['class' => 'form-control'])}}
            </div>
            <br>
            <b>{{ Form::label('email', 'E-mail') }}</b>
            <div>
                {{ Form::email('email', null, ['class' => 'form-control'])}}
            </div>
            <br>
            <b>{{ Form::label('password', 'Senha') }}</b>
            <div>
                {{ Form::password('password', ['class' => 'form-control'])}}
            </div>
            <br>
            <div class="form-check">
                {{ Form::checkbox('notify', 1, null, ['class' => 'form-check-input']) }}
                <b>{{ Form::label('notify', 'Deseja receber notificações?', ['class' => 'form-check-label']) }}</b>
            </div>
            <br>
            <b>{{ Form::label('chat_id', 'Chat Id') }}</b>
            <div>
                {{ Form::text('chat_id', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection