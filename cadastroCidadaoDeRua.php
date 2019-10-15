<?php
header('Content-type: text/html; charset=utf-8');
if (isset($_POST)):
    $sus     = (isset($_POST['nsus2']))? $_POST['nsus2']: '';
    $tempoRua     = (isset($_POST['temporua']))? $_POST['temporua']: '';
    $alimentaAoDia     = (isset($_POST['alimenta']))? $_POST['alimenta']: '';
    $origemAlimentacao     = (isset($_POST['origemalimenta']))? $_POST['origemalimenta']: '';
    $higienePessoal     = (isset($_POST['higiene']))? $_POST['higiene']: '';
    $recebeBeneficio     = (isset($_POST['exampleCheck1']))? $_POST['exampleCheck1']: '';
    $refFamiliar     = (isset($_POST['exampleCheck2']))? $_POST['exampleCheck2']: '';
    // Valida se foram preenchidos todos os campos
    if (empty($sus) || empty($tempoRua) || empty($alimentaAoDia) || empty($origemAlimentacao) || empty($higienePessoal) ):
        $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Preencher todos os campos obrigat�rios(*)!');
        echo json_encode($array);
    else:
        
        // Grava no banco de dados as informa��es do contato
        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

        $pdo = new PDO('mysql:host=localhost;dbname='id11181194_agentedb', 'id11181194_emanuel', 'emanuel123', $opcoes);

        $sql = "INSERT INTO moradorderua (sus, tempoRua, alimentaAoDia, origemAlimentacao, higienePessoal, recebeBeneficio, refFamiliar)VALUES(:sus, :tempoRua,:alimentaAoDia, :origemAlimentacao, :higienePessoal, :recebeBeneficio, :refFamiliar)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':sus', $sus);
        $stm->bindValue(':tempoRua', $tempoRua);
        $stm->bindValue(':alimentaAoDia', $alimentaAoDia);
        $stm->bindValue(':origemAlimentacao', $origemAlimentacao);
        $stm->bindValue(':higienePessoal', $higienePessoal);
        $stm->bindValue(':recebeBeneficio', $recebeBeneficio);
        $stm->bindValue(':refFamiliar', $refFamiliar);
        $stm->execute();

        header("Location: home.html");
        die();
    endif;
endif;

?>
