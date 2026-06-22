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
    $cnpj = TRIM($_POST["cnpj"]);
    $nome = TRIM($_POST["nome"]);
    
    
    $sql_editora = "SELECT cnpj FROM editora WHERE cnpj = '$cnpj'";
    $resultado_editora = $conexao->query($sql_editora);

    
    if ($resultado_editora->num_rows > 0) {

        echo("Editora já cadastradada!");

    } else {
        $comando = "
        INSERT INTO editora
            (cnpj, nome)
        VALUES
            ('$cnpj', '$nome')";

        $consulta = mysqli_query($conexao, $comando);
        
        if ($consulta){
            echo("Editora Cadastrada com Sucesso!");
        } else {
            echo("Erro ao cadastrar editora: " . $conexao->error);
        }
    }
    $conexao->close();
    ?>

</body>
</html>