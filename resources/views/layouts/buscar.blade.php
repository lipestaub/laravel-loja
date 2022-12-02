<div class="d-flex flex-row">
    {{ Form::open(['url' => 'produtos/buscar/resultados', 'method' => 'post']) }}
        {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar'])}}
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
    {{ Form::close() }}
</div>