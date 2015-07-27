@extends('admin.master')

@section('navigation')
    @include('admin.adminnavigation')
@stop

@section('page-styles')
    @parent
    {{HTML::style('css/custom.css')}}
@stop

@section('content')
    <h2>Lista de Conteúdos</h2>
    <table class='table'>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th class="text-right">Ações</th>
        </tr>
        @foreach ($all_content as $content)
            <tr>
                <td>
                    {{ $content->id }}
                </td>
                <td>
                    {{ $content->page_title }}
                </td>
                <td class="text-right">
                    <button type="button" name="button" class="btn btn-default">Editar</button>
                    <button type="button" name="button" class="btn btn-danger">Excluir</button>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $all_content->links() }}
@stop
