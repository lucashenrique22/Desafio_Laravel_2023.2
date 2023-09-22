@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Conferir consulta</h1>
@stop

@section('content')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="user_id">Funcionário</label>

            <input name="user_id" id="user_id" class="form-control" disabled type="text" required
                   value="{{ old('user_id', $appointment->user->name) }}">

        </div>
        <div class="form-group col-md-6">
            <label for="animal_id"> Animal</label>
            <input class="form-control " name="animal_id" id="animal_id" disabled required
                   value="{{ old('animal_id', $appointment->animal->name) }}">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Tratamento desejado</label>
            <input name="name" type="text" class="form-control" id="name" disabled required
                   value="{{ old('name', $appointment->treatment_id) }}" >
        </div>
    </div>
    <div class="form-group">
        <label for="start_date">Data de início </label>
        <input name="start_date" class="form-control" id="start_date" type="datetime-local" disabled required
               value="{{ old('start_date', $appointment->start_date) }}">
    </div>

    <div class="form-group">
        <label for="end_time">Data de término</label>
        <input name="end_time" type="datetime-local" class="form-control" id="end_time" disabled required
        value="{{ old('end_time', $appointment->end_time) }}">
    </div>

    <div class="form-group">
        <label for="cost">Custo</label>
        <input name="cost" type="number" class="form-control" id="cost" disabled required
               value="{{ old('cost', $appointment->cost) }}">
    </div>
@stop
