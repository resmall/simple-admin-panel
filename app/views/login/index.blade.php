@extends('admin.master')

@section('page-styles')
    @parent
    {{HTML::style('css/signin.css')}}
@stop

@section("content")
    {{ Form::open(array('route' => 'user.auth', 'class' => 'form-signin')) }}
        <h2 class="form-signin-heading">Painel Administrativo</h2>
        {{ Form::label('username', 'Usuário', ['class' => 'sr-only']) }}
        {{ Form::text('username', '', ['class' => 'form-control', 'required' => '', 'autofocus' => '']) }}
        {{ Form::label('password', 'Senha', ['class' => 'sr-only']) }}
        {{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
        <div class="checkbox">
            <label>
                {{ Form::checkbox('remember', 'remember-me', false) }} Lembrar de mim
            </label>
        </div>
        {{ Form::submit('Entrar',['class' => 'btn btn-lg btn-primary btn-block']) }}

        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
    {{ Form::close() }}
@stop
