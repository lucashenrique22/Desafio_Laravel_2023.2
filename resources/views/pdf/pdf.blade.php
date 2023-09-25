<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório geral</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 48px;
        }

        h2 {
            margin-top: 20px;
        }

        h3 {
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #D9EAFE;
        }
    </style>
</head>

<body>
<h1>Relatório de Consultas</h1>
<h3>Funcionário: {{ Auth::user()->name }} </h3>
<h3>Data e Hora de Emissão: {{ now()->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</h3>



@foreach($appointments as $appointment)
        <?php

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');


        $start_date = new DateTime($appointment->start_date);


        $nomeMes = ucfirst(strftime('%B', $start_date->getTimestamp()));
        ?>

    <p><strong> <?php echo $nomeMes; ?></strong></p>


    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="text-center">Animal</th>
            <th scope="col" class="text-center">Proprietário</th>
            <th scope="col" class="text-center">Tratamento</th>
            <th scope="col" class="text-center">Data e hora da consulta</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <tr>
            <td class="text-center">{{\App\Models\Animal::find($appointment->animal_id)->name }}</td>
            <td class="text-center">{{ \App\Models\Owner::find(\App\Models\Animal::find($appointment->animal_id)->owner_id)->name }}</td>
            <td class="text-center">{{ \App\Models\Treatment::find($appointment->treatment_id)->name }}</td>
            <td class="text-center">{{ $appointment->start_date }}</td>
        </tr>
        </tbody>
    </table>
@endforeach

</body>

</html>
