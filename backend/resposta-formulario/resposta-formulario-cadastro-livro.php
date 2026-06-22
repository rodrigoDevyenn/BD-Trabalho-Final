<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
</head>
<body>
    <?php

    //conexão
    $host = 'sql213.infinityfree.com';
    $usuario = 'if0_41127565';
    $senha = 'Rl26091981';
    $bd = 'if0_41127565_publicacoes';
    $conexao = new mysqli($host, $usuario, $senha, $bd);
    if ($conexao->connect_error) {
        die("Não foi possível conectar: " . $conexao->connect_error);
    }

    //dados do formulário
    $titulo = TRIM($_POST["titulo"]);
    $isbn = TRIM($_POST["isbn"]);
    $datalancamento = $_POST["datalancamento"];
    $preco = $_POST["preco"];



    //Verifica se o autor
    $autor = TRIM($_POST["autor"]);
    $sql_autor = "SELECT codigo FROM autor WHERE nome = '$autor'";
    $resultado_autor = $conexao->query($sql_autor);

    //Verifica assunto
    $assunto = TRIM($_POST["assunto"]);
    $sql_assunto = "SELECT codigo FROM assunto WHERE descricao = '$assunto'";
    $resultado_assunto = $conexao->query($sql_assunto);

    //verifica editora
    $editora = TRIM($_POST["editora"]);
    $sql_editora = "SELECT codigo FROM editora WHERE nome = '$editora'";
    $resultado_editora = $conexao->query($sql_editora);

    if ($resultado_autor->num_rows > 0) {

        $linha = $resultado_autor->fetch_assoc();
        $codigo_autor = $linha["codigo"];

        if ($resultado_assunto->num_rows > 0){

            $linha = $resultado_assunto->fetch_assoc();
            $codigo_assunto = $linha["codigo"];

            if ($resultado_editora->num_rows > 0){
                
                $linha = $resultado_editora->fetch_assoc();
                $codigo_editora = $linha["codigo"];

                $comando = "
                INSERT INTO livro
                    (isbn, titulo, preco, datalancamento, assunto_codigo, editora_codigo)
                VALUES
                    ('$isbn', '$titulo', '$preco', '$datalancamento', '$codigo_assunto', '$codigo_editora')
                ";
                $consulta = mysqli_query($conexao, $comando);
                $codigo_livro = $conexao->insert_id;
                $comando_autor = "
                INSERT INTO autor_livro
                    (autor_codigo, livro_codigo)
                VALUES
                    ('$codigo_autor', '$codigo_livro')
                ";
                $conexao->query($comando_autor);
                echo("Livro Cadastrado com Sucesso!");

            } else {
                echo("Editora não cadastrada!");
            }
        } else {
            echo("Assunto não cadastrado!");
        }
    } else {
        echo ("Autor não cadastrado!");
    }
    ?>

</body>
</html>