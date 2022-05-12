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

        <h2>Posses</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $livro = 'livro';
        $leitor = 'leitor';

        $sql = 'SELECT livro.titulo as livro, leitor.nome as leitor FROM Livro_Leitor '.
                                                                   'LEFT JOIN livro on livro=livro.livro_id '.
                                                                   'LEFT JOIN leitor on leitor=leitor.leitor_id';

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo '<h3>'.mysqli_error($conexao).'</h3>';
        }



        $cabecalho =
        '<table class="table">' .
        '    <tr>' .
            '        <th>Leitor</th>' .
            '        <th>Livro</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';
                echo '<td>' . $registro[$leitor] . '</td>' .
                    '<td>' . $registro[$livro] . '</td>';
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