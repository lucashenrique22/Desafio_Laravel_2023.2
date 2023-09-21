
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agendar consulta</h1>
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

    <form action="{{ route('appointments.store') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="user_id">Funcionário</label>
                <select class="form-control form-select form-select-sm" name="user_id" id="user_id" required readonly>

                        <option value="{{Auth::user()->id}}">
                            {{ Auth::user()->id }} - {{ Auth::user()->name}}
                        </option>

                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="animal_id"> Animal</label>
                <select class="form-control form-select form-select-sm" name="animal_id" id="animal_id" required>
                    @foreach($animals as $animal)
                        <option value="{{$animal->id}}">{{ $animal->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="treatment_id">Tratamento desejado</label>
                <input name="treatment_id" type="text" class="form-control" id="treatment_id">
            </div>
        </div>
        <div class="form-group">
            <label for="start_date">Data de início </label>
           <input name="start_date" class="form-control" id="start_date" type="datetime-local">
        </div>

        <div class="form-group">
            <label for="end_time">Data de término</label>
            <input name="end_time" type="datetime-local" class="form-control" id="end_time">
        </div>

        <div class="form-group">
            <label for="cost">Custo</label>
            <input name="cost" type="number" class="form-control" id="cost">
        </div>

        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@stop
