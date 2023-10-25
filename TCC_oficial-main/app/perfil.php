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

$comando = $db->prepare('SELECT * FROM musicas WHERE fk_usuarios_us_id = :id');
$comando->execute([":id" => $user['us_id']]);
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
                        <div class="col-md-5">
                            <div class="nomeDoArtista">
                                <p><?= $user['nome'] ?></p>
                            </div>
                        </div>


                        <?php

                        if ($user['nivel_acess'] == 2 || $user['nivel_acess'] == 3) {
                            echo
                            '<div class="col-md-2">
                            <div class="infosArtista">
                                <p>' . $num . ' Faixas</p>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="infosArtista">
                                <p>' . $num2 . ' Albúns</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="editPerf.php" style="text-decoration:none">
                                <button class="btn-seguir" class="botaoSeguir" style="margin-bottom: 30px;">
                                    Editar Perfil
                                </button>
                            </a>
                        </div>';
                        } ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- Parte de baixo rodapé -->
        <div style="height: 100px;">

        </div>

        <?php

        if ($user['nivel_acess'] == 2 || $user['nivel_acess'] == 3) {

            $aleatorio = rand(0, $num - 1);
            $musica = $medias[$aleatorio];

            $aleatorio = rand(0, $num - 1);
            $musica2 = $medias[$aleatorio];

            $aleatorio = rand(0, $num - 1);
            $musica3 = $medias[$aleatorio];

            $aleatorio = rand(0, $num - 1);
            $musica4 = $medias[$aleatorio];
            echo
            '<div class="faixas">
            <div class="row">
                <div class="col-md-2">
                    <a href="list.php?id=' . $user['us_id'] . '" style="text-decoration:none"><p style="font-size: 24pt; font-weight: bold; color: black;">Faixas</p></a>
                </div>
                <div class="col-md-10" style="text-align: right;">
                    <a href="insert.php" style="text-decoration:none">
                        <button class="btn-seguir" class="botaoSeguir" style="margin-bottom: 30px;">
                            Adicionar Nova
                        </button>
                    </a>
                </div>
            </div>
            <div class="scrool">
                <div class="quadradinhos">
                    <div class="quadradinho">
                        <img src="' . $musica['capa'] . '" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="' . $musica['capa'] . '" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="' . $musica['capa'] . '" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="' . $musica['capa'] . '" class="album" alt="Possível álbum a ser colocado">
                    </div>
                </div>
            </div>
        </div>';
        } ?>


        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <form action="perfil.php" method="post">
                    <button class="btn-seguir" type="submit" class="botaoSeguir">
                        Sair da conta
                    </button>
                </form>
            </div>
        </div>
</div>
</div>




<?php
include('includes/footer.php');
?>