<?php
header('Content-type: text/html; charset=utf-8');

if (isset($_POST)):
    $cep    = (isset($_POST['cep']))? $_POST['cep']: '';
    $numero   = (isset($_POST['numero']))? $_POST['numero']: '';
    $rua = (isset($_POST['rua']))? $_POST['rua']: '';
    $abastecimento     = (isset($_POST['abastecimento']))? $_POST['abastecimento']: '';
    $animais     = (isset($_POST['animais']))? $_POST['animais']: '';
    $esgoto     = (isset($_POST['esgoto']))? $_POST['esgoto']: '';
    $lixo     = (isset($_POST['lixo']))? $_POST['lixo']: '';
    $nSus     = (isset($_POST['nsus']))? $_POST['nsus']: '';
    // Valida se foram preenchidos todos os campos
    if (empty($cep) || empty($numero) || empty($rua) || empty($abastecimento) || empty($animais) || empty($esgoto) || empty($lixo) || empty($nSus)):
        $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Preencher todos os campos obrigat�rios(*)!');
        echo json_encode($array);
    else:

        // Grava no banco de dados as informa��es do contato
        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

        $pdo = new PDO('mysql:host=localhost;dbname='id11181194_agentedb', 'id11181194_emanuel', 'emanuel123', $opcoes);

        $sql = "INSERT INTO moradia (cep, numero, rua, abastecimento, animais, esgoto, lixo, nSus)VALUES(:cep, :numero, :rua, :abastecimento, :animais, :esgoto, :lixo, :nSus)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':cep', $cep);
        $stm->bindValue(':numero', $numero);
        $stm->bindValue(':rua', $rua);
        $stm->bindValue(':abastecimento', $abastecimento);
        $stm->bindValue('animais', $animais);
        $stm->bindValue('esgoto', $esgoto);
        $stm->bindValue('lixo', $lixo);
        $stm->bindValue('nSus', $nSus);
        $stm->execute();

        header("Location: visita2.html");
        die();

    endif;
endif;

?>
