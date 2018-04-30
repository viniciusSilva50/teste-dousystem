@extends('pages.admin.home')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Status</th>
            <th scope="col">Situação</th>
            <th scope="col">Data inicial</th>
            <th scope="col">Data final</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activitys as $activity)
            <tr>
                <td>{{$activity->name}}</td>
                <td>{{$activity->descriptionShort}}</td>
                <td>{{$activity->status}}</td>
                <td>{{$activity->situation}}</td>
                <td>{{$activity->beginDate}}</td>
                <td>{{$activity->endDate}}</td>
                <td>
                    <div class="btn-info btn">
                        <a href="{{route('activity.edit', $activity->id)}}">
                            Editar
                        </a>
                    </div>
                    <div class="btn-danger btn">
                        <a href="{{route('activity.delete', $activity->id)}}">
                            Excluir
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop