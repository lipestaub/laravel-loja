@extends('layouts.index')

@section('content')
<div class="align-center">
    @if (isset($title) && $title != null)
        <h3>{{ $title }}</h3>
    @else
        <h3>Cadastrar usu&aacute;rios</h3>
    @endif
    <br>
</div>

@if (Session::has('warning'))
    <div class="card text-bg-warning mb-3">
        <div class="card-header">Aviso</div>
        <div class="card-body">
            <span class="card-text">{{ Session::get('warning') }}</span>
        </div>
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