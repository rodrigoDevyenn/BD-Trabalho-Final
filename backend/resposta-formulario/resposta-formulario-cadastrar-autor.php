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
    $nome = TRIM($_POST["nome"]);
    $passaporte = TRIM($_POST["passaporte"]);
    $datanascimento = $_POST["datanascimento"];

    //Verifica se há nacionalidade
    $nacionalidade = $_POST["nacionalidade"];
    $sql_nacionalidade = "SELECT codigo FROM nacionalidade WHERE pais = '$nacionalidade'";
    $resultado_nacionalidade = $conexao->query($sql_nacionalidade);

    
    if ($resultado_nacionalidade->num_rows > 0) {

        $linha = $resultado_nacionalidade->fetch_assoc();
        $codigo_nacionalidade = $linha["codigo"];

            $comando = "
            INSERT INTO autor
                (nome, passaporte, datanascimento, nacionalidade_codigo)
            VALUES
                ('$nome', '$passaporte', '$datanascimento', '$codigo_nacionalidade')";

            $consulta = mysqli_query($conexao, $comando);
            
            if ($consulta){
                echo("Autor Cadastrado com Sucesso!");
            } else {
                echo("Erro ao cadastrar autor: " . $conexao->error);
            }
        
    } else {
        echo ("Nacionalidade não cadastrada!");
    }
    $conexao->close();
    ?>

</body>
</html>