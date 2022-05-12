<!DOCTYPE html>

<head>
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

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo = 'titulo';
        $autor = 'autor';
        $data_publicacao = 'data_publicacao';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql = 'SELECT titulo, autor.nome as autor, data_publicacao FROM livro LEFT JOIN autor ON livro.autor = autor.autor_id';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo '<h3>'.mysqli_error($conexao).'</h3>';
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>Título</th>' .
            '        <th>Autor</th>' .
            '        <th>Data de Publicação</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';
                echo '<td>' . $registro[$titulo] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' .
                    '<td>' . $registro[$data_publicacao] . '</td>';
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