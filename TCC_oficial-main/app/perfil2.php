<?php

require './vendor/autoload.php';

use Application\DBConnection\MySQLConnection;

$db = new MySQLConnection();

if (!isset($_SESSION['user'])) {
    //pega as info de uma session já iniciada em entrar
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_destroy();
        header('location:index.php');
    }

    $descompactar = $_SESSION['user'];
    $user = $descompactar[0];
}

$comando = $db->prepare('SELECT * FROM usuarios WHERE us_id = :id');
$comando->execute([":id" => $_GET['nome']]);
$dados = $comando->fetchAll(PDO::FETCH_ASSOC);
$user = $dados[0];

$comando = $db->prepare('SELECT * FROM musicas WHERE fk_usuarios_us_id = :id');
$comando->execute([":id" => $_GET['nome']]);
$medias = $comando->fetchAll(PDO::FETCH_ASSOC);
$num = count($medias);
$num2 = 0;

include('includes/noHeader.php');
?>

<div class="container">
    <main class="main" style="padding-top: 0;">

        <!-- BANNER E IMAGEM DE PERFIL -->
        <div class="banner-artista">
            <img src="arquivos/imagensDoSite/textPura.jpg" alt="Banner" class="img-banner">

            <div class="row" style="padding: 0; margin: 0;">

                <div class="col-md-2 col-sm-2" style="overflow: hidden;">
                    <div class="foto-artista">
                        <img class="ft-artista" src="<?= $user['user_perfil'] ?>" alt="">
                    </div>
                </div>

                <!-- dados do banner -->

                <div class="col-md-10 col-sm-10">
                    <div class="row" style="margin-top: -60px">
                        <div class="col-md-8">
                            <div class="nomeDoArtista">
                                <p><?= $user['nome'] ?></p>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="infosArtista">
                                <p><?= $num ?> Faixas</p>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="infosArtista">
                                <p><?= $num2 ?> Albúns</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Parte de baixo rodapé -->
        <div style="height: 100px;">

        </div>


        <div class="faixas">

        <?= '<a href="list.php?id=' . $user['us_id'] . '"style="text-decoration:none">'; ?>
        <p style="font-size: 24pt; font-weight: bold; color: black;">Faixas</p>
</a>
            <div class="scrool">
                <div class="quadradinhos">
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica = $medias[$aleatorio];
                                echo $musica['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica2 = $medias[$aleatorio];
                                echo $musica2['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica3 = $medias[$aleatorio];
                                echo $musica3['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica4 = $medias[$aleatorio];
                                echo $musica4['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                </div>
            </div>
        </div>
</div>
</div>




<?php
include('includes/footer.php');
?>