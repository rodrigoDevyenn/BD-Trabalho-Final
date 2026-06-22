<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nacionalidade</title>
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
    $pais = TRIM($_POST["pais"]);
    
    
    $sql_nacionalidade = "SELECT pais FROM nacionalidade WHERE cnpj = '$pais'";
    $resultado_nacionalidade = $conexao->query($sql_nacionalidade);

    
    if ($resultado_nacionalidade->num_rows > 0) {

        echo("Nacionalidade já cadastradada!");

    } else {
        $comando = "
        INSERT INTO nacionalidade
            (pais)
        VALUES
            ('$pais')";

        $consulta = mysqli_query($conexao, $comando);
        
        if ($consulta){
            echo("Nacionalidade Cadastrada com Sucesso!");
        } else {
            echo("Erro ao cadastrar nacionalidade: " . $conexao->error);
        }
    }
    $conexao->close();
    ?>

</body>
</html>