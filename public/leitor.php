<!DOCTYPE html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Rede Social de Leitores - Hector Mattevi</h1>

        <h2>Leitores</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $nome = 'nome';
        $nascimento = 'data_nascimento';
        $cadastro = 'data_cadastro';

        $sql = 'SELECT nome, data_nascimento, data_cadastro FROM leitor;';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo '<h3>'.mysqli_error($conexao).'</h3>';
        }



        $cabecalho =
        '<table class="table">' .
        '    <tr>' .
            '        <th>Nome</th>' .
            '        <th>Data Nascimento</th>' .
            '        <th>Data Cadastro</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';
                echo '<td>' . $registro[$nome] . '</td>' .
                    '<td>' . $registro[$nascimento] . '</td>' .
                    '<td>' . $registro[$cadastro] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>