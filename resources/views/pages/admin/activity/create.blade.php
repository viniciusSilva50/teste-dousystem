@extends('pages.admin.home')
@section('content')
    <form action="" id="form-activity" method="post" class="col-lg-12">
        @csrf

        <div class="form-group col-lg-12">
            <label for="name">Nome</label>
            <input id="name" name="name" class="form-control" type="text" placeholder="Nome" title="Nome" maxlength="255" required>
        </div>

        <div class="form-group col-lg-12">
            <label for="description">Descrição</label>
            <textarea id="description"  name="description" class="form-control" rows="4" cols="30" placeholder="Descrição" title="Descrição" maxlength="600" required ></textarea>
        </div>

        <div class="form-row col-lg-12">
            <div class="form-group col-lg-6">
                <label for="begin-date">Data inicial</label>
                <input id="begin-date" name="begin-date" class="begin-date form-control" type="text" placeholder="Data inicial" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="begin-date">Data final</label>
                <input id="end-date" name="end-date" class="end-date form-control" type="text"  placeholder="Data final">
            </div>
        </div>

        <div class="form-row col-lg-12">
            <div class="form-group col-lg-6">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    @foreach($status as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-lg-3 offset-lg-3">
                <input id="ative" name="ative" type="checkbox" class="form-control">
                <label for="ative">Ativo</label>
            </div>
        </div>

        <div class="form-group col-lg-12">
            <input id="save" type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </form>
@stop