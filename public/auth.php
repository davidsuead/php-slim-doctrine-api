<?php
@session_start();
error_reporting(0);
if (isset($_POST['user']) && isset($_POST['senha'])) {
    if ($_POST['user'] == 'apisoluti' && $_POST['senha'] == 'provaPratica') {
        $_SESSION['AUTH'] = true;
    }
}
if (!isset($_SESSION['AUTH'])) {
    ?>
    <div style="width: 100%; text-align: center;">
        <form action="" method="post">
            Username:
            <input type="text" name="user">
            <br><br>
            Password:
            <input type="password" name="senha">
            <br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>
    <?php
} else {
    if (isset($_GET['arquivo'])) {
        $logs = file('../var/log/' . $_GET['arquivo'] . '.log');
        if ($logs === false) {
            echo '<br><br>';
            echo "<div style='width: 100%; text-align: center;'>Arquivo não encontrado!</div>";
        } else {
            $dados = [];
            if (count($logs) > 0) {
                foreach ($logs as $key => $log) {
                    $valor = explode(" ", $log, 3);
                    $dados[] = [
                        'dataAcao' => getConverteDataBr(str_replace('[', '', $valor[0])) . ' ' . str_replace(']', '', $valor[1]),
                        'descricao' => trim($valor[2])
                    ];
                }
            }
            echo "<div style='width: 100%; text-align: center;'>";
            echo '<span style="font-size:36px;">Log de Falhas!</span>';
            echo '<br>';
            echo '<br>';
            echo "<a href='auth.php'>Voltar para Lista</a>";
            echo '<br>';
            echo '<br>';
            echo "<table width='100%' border='1' cellpadding='2' cellspacing='0'>";
            echo '<tr style="background-color: #000000; color:#FFFFFF;">';
            echo '<td style="width: 20%">';
            echo '<b>Data/Hora</b>';
            echo '</td>';
            echo '<td>';
            echo '<b>Descrição</b>';
            echo '</td>';
            echo '</tr>';
            if (count($dados) > 0) {
                $i = 1;
                foreach ($dados as $arr) {
                    if ($i % 2 == 0) {
                        echo '<tr style="background-color: #E7E7E7; font-size:13px;">';
                    } else {
                        echo '<tr style="background-color: #ffffff; font-size:13px;">';
                    }
                    echo '<td>';
                    echo $arr['dataAcao'];
                    echo '</td>';
                    echo '<td>';
                    echo $arr['descricao'];
                    echo '</td>';
                    echo '<tr>';
                    $i++;
                }
            }
            echo '</table>';
            echo '</div>';
        }
    } else {
        echo "<div style='width: 100%; text-align: center; font-size:36px;'>Arquivos de Log!</div>";
        echo '<br>';
        echo "<table width='100%' border='1' cellpadding='2' cellspacing='0'>";
        echo '<tr style="background-color: #000000; color:#FFFFFF;">';
        echo '<td>';
        echo '<b>Arquivo</b>';
        echo '</td>';
        echo '</tr>';
        $pasta = '../var/log/';
        if (is_dir($pasta)) {
            $diretorio = dir($pasta);
            $i = 1;
            while (($arquivo = $diretorio->read()) !== false) {
                if (substr($arquivo, -3) == "log") {
                    if ($i % 2 == 0) {
                        echo '<tr style="background-color: #E7E7E7; font-size:13px;">';
                    } else {
                        echo '<tr style="background-color: #ffffff; font-size:13px;">';
                    }
                    $nomeArquivo = str_replace('.log', '', $arquivo);
                    echo '<td>';
                    echo "<a href='?arquivo={$nomeArquivo}' style='text-decoration:none; color:#000000;'>";
                    echo $nomeArquivo;
                    echo '</a>';
                    echo '</td>';
                    echo '<tr>';
                    $i++;
                }
            }
            $diretorio->close();
        } else {
            echo '<tr style="background-color: #ffffff; font-size:13px;">';
            echo '<td>';
            echo "Pasta não existe";
            echo '</td>';
            echo '<tr>';
        }
        echo '</table>';
    }
}

function getConverteDataBr($data, $hora = false) {
    $novadata = substr($data, 8, 2) . "/" . substr($data, 5, 2) . "/" . substr($data, 0, 4);
    if ($hora == true) {
        $novadata .= " " . substr($data, 11);
    }
    return $novadata;
}
?>