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

        <h2>Leituras</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $leitor = 'leitor';
        $livro = 'livro';
        $inicio = 'data_inicio';
        $fim = 'data_fim';

        $sql = 'SELECT leitor.nome as leitor, livro.titulo as livro , data_inicio, data_fim FROM leitura '.
                                                                                           'LEFT JOIN leitor on leitor = leitor.leitor_id '.
                                                                                           'LEFT JOIN livro on livro = livro.livro_id';

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo '<h3>'.mysqli_error($conexao).'</h3>';
        }

        $cabecalho =
        '<table class="table">' .
        '    <tr>' .
            '        <th>Leitor</th>' .
            '        <th>Livro</th>' .
            '        <th>Data Inicio</th>' .
            '        <th>Data Fim</th>' .

            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';
                echo '<td>' . $registro[$leitor] . '</td>' .
                    '<td>' . $registro[$livro] . '</td>' .
                    '<td>' . $registro[$inicio] . '</td>' .
                    '<td>' . $registro[$fim] . '</td>';
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