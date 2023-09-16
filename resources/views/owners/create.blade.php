
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulário de Cadastro</h1>
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

    <form action="{{ route('owners.store') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome completo</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Informe o nome">
            </div>
            <div class="form-group col-md-6">
                <label for="profile_picture">Foto de perfil</label>
                <input name="profile_picture" type="file" class="form-control" id="profile_picture">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Informe o email">
            </div>

            <div class="form-group col-md-6">
                <label for="cpf">CPF</label>
                <input name="cpf" type="number" class="form-control" id="cpf" placeholder="Informe o CPF">
            </div>
        </div>
        <div class="form-group">
            <label for="street">Rua:</label>
            <input name="street" type="text" class="form-control" id="street" placeholder="Informe a rua">
        </div>
        <div class="form-group">
            <label for="neighborhood">Bairro:</label>
            <input name="neighborhood" type="text" class="form-control" id="neighborhood" placeholder="Informe o bairro">
        </div>
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input name="cep" type="text" class="form-control" id="cep" placeholder="Informe o CEP">
        </div>
        <div class="form-group">
            <label for="state">Estado:</label>
            <select name="state" class="form-control" id="state">
                <option value="">Selecione o estado</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
        <div class="form-group">
            <label for="number">Número:</label>
            <input name="number" type="text" class="form-control" id="number" placeholder="Informe o número">
        </div>
        <div class="form-group">
            <label for="birth_date">Data de nascimento</label>
            <input name="birth_date" type="date" class="form-control" id="birth_date">
        </div>
        <div class="form-group">
            <label for="phone_number">Número de telefone</label>
            <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="(99) 99 0000-0000">
        </div>

        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@stop
