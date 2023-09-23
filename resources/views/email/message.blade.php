@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Envio de E-mail</h1>
@stop

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Envie uma mensagem para os proprietários do sistema</h3>
        </div>
        <form action="/email/send" method="POST">
            @csrf
            <div class="card-body">
                <label for="h2">Assunto</label>
                <input type="text" name="header" class="form-control" placeholder="Ex: Desconto especial apenas nesse mês">
            </div>
            <div class="card-body">
                <label for="h2">Saudações</label>
                <input type="text" name="greetings" class="form-control" placeholder="Ex: Queridos clientes,">
            </div>
            <div class="card-body">
                <label for="firstParagraph">Primeiro parágrafo</label>
                <textarea name="firstParagraph" class="form-control" rows="4" placeholder="Ex:  Viemos através deste email informar que..."></textarea>
            </div>
            <div class="card-body">
                <label for="h2">Segundo parágrafo</label>
                <textarea name="secondParagraph" class="form-control" rows="4" placeholder="Ex: Como forma de expressar nossa gratidão pela confiança que vocês depositam em nossos serviços, estamos empolgados..."></textarea>
            </div>
            <div class="card-body">
                <label for="h2">Agradecimentos</label>
                <input type="text" name="thanks" class="form-control"  placeholder="Ex: Agradecimentos especiais de toda nossa equipe por...">
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://kit.fontawesome.com/31a11ca086.js" crossorigin="anonymous"></script>
@stop
