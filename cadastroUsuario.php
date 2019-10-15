<?php
header('Content-type: text/html; charset=utf-8');

if (isset($_POST)):
    $nome    = (isset($_POST['nome']))? $_POST['nome']: '';
    $email   = (isset($_POST['email']))? $_POST['email']: '';
    $senha = (isset($_POST['pwd']))? $_POST['pwd']: '';
    $sus     = (isset($_POST['nsus']))? $_POST['nsus']: '';
    $cep     = (isset($_POST['cep']))? $_POST['cep']: '';
    $numero     = (isset($_POST['num']))? $_POST['num']: '';
    $endereco     = (isset($_POST['endereco']))? $_POST['endereco']: '';
    echo $_POST['nome'];
    // Valida se foram preenchidos todos os campos
    if (empty($nome) || empty($email) || empty($senha) || empty($sus) || empty($cep) || empty($numero) || empty($endereco)):
        $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Preencher todos os campos obrigat�rios(*)!');
        echo json_encode($array);
    else:

        // Grava no banco de dados as informa��es do contato
        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

        $pdo = new PDO('mysql:host=localhost;dbname='id1181194_agentedb', 'id11181194_emanuel', 'emanuel123', $opcoes);

        $sql = "INSERT INTO usuario (nome, email, senha, sus, cep, numero, endereco)VALUES(:nome, :email, :senha, :sus, :cep, :numero, :endereco)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':senha', $senha);
        $stm->bindValue(':sus', $sus);
        $stm->bindValue('cep', $cep);
        $stm->bindValue('numero', $numero);
        $stm->bindValue('endereco', $endereco);
        $stm->execute();

        header("Location: index.html");
        die();

    endif;
endif;

?>
