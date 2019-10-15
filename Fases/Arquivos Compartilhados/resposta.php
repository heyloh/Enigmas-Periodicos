<?php
session_start();
$ult_enig = $_POST['ult_enig']; //Essa var deve ter o ultimo enigma que o jogador passou por
$resp = $_POST['resp'];
$resp = strtolower($resp);
$array_enig = $_SESSION['array_enig']; //Essa var possui quais os desafios foram superados


//FIM DO JOGO
if (($array_enig["Yasmin"] == true) and ($array_enig["Shaiene"] == true) and ($array_enig["Arlene"] == true) and ($array_enig["Lohana"] == true) and ($array_enig["Gean"] == true)) {
    header('Location: endPage.html');
}



switch ($ult_enig) {
        //A Yasmin decidiu fazer a verificação da resposta dela nessa página, e eu, na minha. Façam como quiser
    case "Yasmin":
        if ($resp == "carbono") {
            $array_enig["Yasmin"] = true;
            $_SESSION['array_enig'] = $array_enig;
            nextChallenge();
        } else {
            header('Location: faseYasmin.php');
        }
        break;

    case "Shaiene":
        $array_enig["Shaiene"] = true;
        $_SESSION['array_enig'] = $array_enig;
        nextChallenge();
        break;

        //Insiram aqui, a verificação de vocês, lembrem-se de alternarem a vossa chave para true
        //Certifiquem-se de possuir as mesmas 3 linhas que o meu(com excessão da 1a, modifiquem ela)
    case "Arlene":
        break;
    case "Lohana":
        if ($resp == "fosforo") {
            $array_enig["Lohana"] = true;
            $_SESSION['array_enig'] = $array_enig;
            nextChallenge();
        } else {
            header('Location: ../Lohana/paget.php');
        }
        break;
    case "Gean":
        break;
}

function nextChallenge()
{ //Essa função recursiva seleciona a próxima fase, mudem no seu trecho o nome do seu arquivo
    $rand = mt_rand(1, 5);
    switch ($rand) {
        case 1:
            if ($array_enig["Yasmin"] == false)
                header('Location: ../Yasmin/faseYasmin.php');
            else
                nextChallenge();
            break;

        case 2:
            if ($array_enig["Shaiene"] == false)
                header('Location: ../Shaiene/RS.php');
            else
                nextChallenge();
            break;

        case 3:
            if ($array_enig["Arlene"] == false)
                header('Location: ../Arlene/aaa.php');
            else
                nextChallenge();
            break;

        case 4:
            if ($array_enig["Lohana"] == false)
                header('Location: ../Lohana/paget.php');
            else
                nextChallenge();
            break;

        case 5:
            if ($array_enig["Gean"] == false)
                header('Location: ../Gean/aaa.php');
            else
                nextChallenge();
            break;
    }
}