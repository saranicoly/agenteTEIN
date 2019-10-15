<?php
header('Content-type: text/html; charset=utf-8');

if (isset($_POST)):
    $sus    = (isset($_POST['nsus2']))? $_POST['nsus2']: '';
    $doencaCardiaca   = (isset($_POST['doencardiaca']))? $_POST['doencardiaca']: '';
    $peso = (isset($_POST['peso']))? $_POST['peso']: '';
    $doencaRespiratoria     = (isset($_POST['doencarespiratoria']))? $_POST['doencarespiratoria']: '';
    $problemaRins     = (isset($_POST['rins']))? $_POST['rins']: '';
    $fumante     = (isset($_POST['inlineCheckbox1']))? $_POST['inlineCheckbox1']: '';
    $mudanca     = (isset($_POST['inlineCheckbox2']))? $_POST['inlineCheckbox2']: '';
    $alcool     = (isset($_POST['inlineCheckbox3']))? $_POST['inlineCheckbox3']: '';
    $diabetes     = (isset($_POST['inlineCheckbox4']))? $_POST['inlineCheckbox4']: '';
    $drogas     = (isset($_POST['inlineCheckbox5']))? $_POST['inlineCheckbox5']: '';
    $avcDerrame     = (isset($_POST['inlineCheckbox6']))? $_POST['inlineCheckbox6']: '';   
    $hipertenso     = (isset($_POST['inlineCheckbox7']))? $_POST['inlineCheckbox7']: '';
    $cancer     = (isset($_POST['inlineCheckbox8']))? $_POST['inlineCheckbox8']: '';   
    // Valida se foram preenchidos todos os campos
    if (empty($sus) || empty($doencaCardiaca) || empty($peso) || empty($doencaRespiratoria) || empty($problemaRins)):
        $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Preencher todos os campos obrigat�rios(*)!');
        echo json_encode($array);
    else:

        // Grava no banco de dados as informa��es do contato
        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

        $pdo = new PDO('mysql:host=localhost;dbname='id11181194_agentedb', 'id1181194_emanuel', 'emanuel123', $opcoes);

        $sql = "INSERT INTO saude (sus, doencaCardiaca, peso, doencaRespiratoria, problemaRins, fumante, mudanca, alcool, diabetes, drogas, avcDerrame, hipertenso, cancer)VALUES(:sus, :doencaCardiaca, :peso, :doencaRespiratoria, :problemaRins, :fumante, :mudanca, :alcool, :diabetes, :drogas, :avcDerrame, :hipertenso, :cancer)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':sus', $sus);
        $stm->bindValue(':doencaCardiaca', $doencaCardiaca);
        $stm->bindValue(':peso', $peso);
        $stm->bindValue(':doencaRespiratoria', $doencaRespiratoria);
        $stm->bindValue('problemaRins', $problemaRins);
        $stm->bindValue('fumante', $fumante);
        $stm->bindValue('mudanca', $mudanca);
        $stm->bindValue('alcool', $alcool);
        $stm->bindValue('diabetes', $diabetes);
        $stm->bindValue('drogas', $drogas);
        $stm->bindValue('avcDerrame', $avcDerrame);
        $stm->bindValue('hipertenso', $hipertenso);
        $stm->bindValue('cancer', $cancer);
        $stm->execute();

        header("Location: visita4.html");
        die();

    endif;
endif;

?>
