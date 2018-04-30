@extends('pages.admin.home')
@section('content')
    <form action="{{route('activity.save')}}" id="form-activity" method="POST" class="col-lg-12">
        @csrf

        @if($errors->has('error'))
            <div class="alert alert-danger">{{$errors->first('error')}}</div>
        @endif

        <div class="form-group col-lg-12">
            <label for="name">Nome</label>
            <input id="name" name="name" class="form-control" type="text" placeholder="Nome" title="Nome" required  maxlength="255" value="{{old('name')}}" >
            @if($errors->has('name'))
                <div class="alert alert-danger">{{$errors->first('name')}}</div>
            @endif
        </div>

        <div class="form-group col-lg-12">
            <label for="description">Descrição</label>
            <textarea id="description"  name="description" class="form-control" rows="4" cols="30" placeholder="Descrição" title="Descrição" required maxlength="600">{{old('description')}}</textarea>
            @if($errors->has('description'))
                <div class="alert alert-danger">{{$errors->first('description')}}</div>
            @endif
        </div>

        <div class="form-row col-lg-12">
            <div class="form-group col-lg-6">
                <label for="begin_date">Data inicial</label>
                <input id="begin_date" name="begin_date" class="begin_date form-control" type="text" placeholder="Data inicial" required value="{{old('begin_date')}}">
                @if($errors->has('begin_date'))
                    <div class="alert alert-danger">{{$errors->first('begin_date')}}</div>
                @endif
            </div>

            <div class="form-group col-lg-6">
                <label for="end_date">Data final</label>
                <input id="end_date" name="end_date" class="end_date form-control" type="text"  placeholder="Data final" value="{{old('end_date')}}">
                @if($errors->has('end_date'))
                    <div class="alert alert-danger">{{$errors->first('end_date')}}</div>
                @endif
            </div>
        </div>

        <div class="form-row col-lg-12">
            <div class="form-group col-lg-6">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    @foreach($status as $value)
                        <option @if(old('status') == $value->id) selected  @endif value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-lg-3 offset-lg-3">
                <input id="active" name="active" type="checkbox" class="form-control">
                <label for="active">Ativo</label>
            </div>
        </div>

        <div class="form-group col-lg-12">
            <input id="save" type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </form>
@stop
