@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Visualizar animal</h1>
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

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nome</label>
            <input disabled name="name" type="text" class="form-control" id="name"
                   required value="{{ old('name', $animal->name) }}">
        </div>
        <div class="form-group col-md-6">
            <label for="species">Espécie</label>
            <input disabled name="species" type="text" class="form-control" id="species"
                   required value="{{ old('species', $animal->species) }}" >
        </div>
        <div class="form-group col-md-6">
            <label for="breed">Raça</label>
            <input disabled name="breed" type="text" class="form-control" id="breed"
                   required value="{{ old('breed', $animal->breed) }}">
        </div>

        <div class="form-group col-md-6">
            <label for="owner">Proprietário</label>
            <input disabled name="owner" type="text" class="form-control" id="owner"
                   required value="{{ old('owner', $animal->owner->name) }}">
        </div>

        <div class="form-group col-md-6">
            <label for="birth_date">Data de nascimento</label>
            <input disabled name="birth_date" type="date" class="form-control" id="birth_date"
                   required value="{{ old('birth_date', $animal->birth_date) }}">
        </div>
        <div class="form-group col-md-6">
            <label>Tratamentos Realizados:</label>
            <input disabled name="appointment" type="text" class="form-control" id="appointment"
            required value= @foreach ($appointments as $appointment)
                @if ($animal->id === $appointment->animal_id)
                    {{\App\Models\Treatment::find($appointment->treatment_id)->name }}
                @endif
           @endforeach>

        </div>

@stop
