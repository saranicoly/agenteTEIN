<?php
header('Content-type: text/html; charset=utf-8');

if (isset($_POST)):
    $sus     = (isset($_POST['nsus2']))? $_POST['nsus2']: '';
    $parentesco    = (isset($_POST['parentesco']))? $_POST['parentesco']: '';
    $escolaridade   = (isset($_POST['escolaridade']))? $_POST['escolaridade']: '';
    $genero = (isset($_POST['genero']))? $_POST['genero']: '';
    $deficiencia     = (isset($_POST['deficiencia']))? $_POST['deficiencia']: '';
    $criancaFicaCom     = (isset($_POST['crianca']))? $_POST['crianca']: '';
    $planoDeSaude     = (isset($_POST['inlineCheckbox1']))? $_POST['inlineCheckbox1']: '';
    $mudanca     = (isset($_POST['inlineCheckbox2']))? $_POST['inlineCheckbox2']: '';
    $obito     = (isset($_POST['inlineCheckbox3']))? $_POST['inlineCheckbox3']: '';
    // Valida se foram preenchidos todos os campos
    if (empty($parentesco) || empty($escolaridade) || empty($genero) || empty($sus) || empty($deficiencia) || empty($criancaFicaCom)):
        $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Preencher todos os campos obrigat�rios(*)!');
        echo json_encode($array);
    else:

        // Grava no banco de dados as informa��es do contato
        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

        $pdo = new PDO('mysql:host=localhost;dbname='id11181194_agentedb', 'id11181194_emanuel', 'emanuel123', $opcoes);

        $sql = "INSERT INTO individual (sus, parentesco, escolaridade, genero, deficiencia, criancaFicaCom, planoDeSaude, mudanca, obito)VALUES( :sus,:parentesco, :escolaridade, :genero,  :deficiencia, :criancaFicaCom, :planoDeSaude, :mudanca, :obito)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':sus', $sus);
        $stm->bindValue(':parentesco', $parentesco);
        $stm->bindValue(':escolaridade', $escolaridade);
        $stm->bindValue(':genero', $genero);
        $stm->bindValue('deficiencia', $deficiencia);
        $stm->bindValue('criancaFicaCom', $criancaFicaCom);
        $stm->bindValue('planoDeSaude', $planoDeSaude);
        $stm->bindValue('mudanca', $mudanca);
        $stm->bindValue('obito', $obito);
        $stm->execute();

        header("Location: visita3.html");

    endif;
endif;

?>
