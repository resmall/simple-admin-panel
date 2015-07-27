@extends('admin.master')

@section('navigation')
    @include('admin.adminnavigation')
@stop

@section('page-styles')
    @parent
    {{HTML::style('css/custom.css')}}
@stop

@section("content")
    <div class="row">
        {{ Form::open(array('route' => 'store', 'files' => true)) }}
            <h2>Inclusão de conteúdo</h2>
            <div class="form-group">
                {{ Form::label('page_title', 'Título') }}
                {{ Form::text('page_title', null, ['class' => 'form-control', 'required' => '', 'autofocus' => '']) }}
            </div>
            <div class="form-group">
                {{ Form::label('page_content', 'Conteúdo') }}
                {{ Form::textarea('page_content', null,  ['class' => 'form-control', 'required' => '']) }}
            </div>
            <div class="form-group">
                {{ Form::label('featured_image', 'Imagem destaque') }}
                {{ Form::file('featured_image') }}
            </div>
            <div class="form-group">
                {{ Form::submit('Criar Conteúdo',['class' => 'btn btn-lg btn-success btn-block']) }}
            </div>
        {{ Form::close() }}
    </div>

    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif

    @if(Session::has('success'))
        <h4>{{ Session::get('success') }}</h4>
    @endif
@stop
