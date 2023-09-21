
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastro de animais</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('animals.store') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Informe o nome">
            </div>
            <div class="form-group col-md-6">
                <label for="species">Espécie</label>
                <input name="species" type="text" class="form-control" id="species" placeholder="Informe a espécie">
            </div>
            <div class="form-group col-md-6">
                <label for="breed">Raça</label>
                <input name="breed" type="text" class="form-control" id="breed" placeholder="Informe a raça">
            </div>
        </div>
        <div class="form-group">
            <label for="owner_id">Proprietário:</label>
            <select class="form-control form-select form-select-sm" name="owner_id" id="owner_id">
                @foreach($owners as $owner)
                    <option value="{{$owner->id}}">{{ $owner->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="birth_date">Data de nascimento</label>
            <input name="birth_date" type="date" class="form-control" id="birth_date">
        </div>

        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@stop
