<?php

require './vendor/autoload.php';

use Application\DBConnection\MySQLConnection;

$db = new MySQLConnection();



if (!isset($_SESSION['user'])) {
    //pega as info de uma session já iniciada em entrar
    session_start();

    $descompactar = $_SESSION['user'];
    $user = $descompactar[0];
}
include('includes/header.php');

$comando = $db->prepare('SELECT * FROM musicas WHERE genero = :genero');
$comando->execute([":genero" => $_GET['genero']]);
$medias = $comando->fetchAll(PDO::FETCH_ASSOC);
$select = $medias[0];

$num = count($medias);

$comando = $db->prepare('SELECT * FROM usuarios WHERE us_id = :id');
$comando->execute([":id" => $select['fk_usuarios_us_id']]);
$pessoas = $comando->fetchAll(PDO::FETCH_ASSOC);
$num2 = count($pessoas);
?>

<div class="container">
    <main class="main" style="padding-top: 0;">

        <!-- BANNER E IMAGEM DE PERFIL -->
        <div class="banner-genero">
            <img src="arquivos/imagensDoSite/textPura.jpg" alt="Banner" class="img-banner">
            <div class="text-genero">
                <p><?= $_GET['genero'] ?></p>
            </div>
        </div>

        <div class="text-genero2">
            <p>Perfis</p>
        </div>

        <div class="scrool">


            <div class="quadradinhos">

                <div class="boladinho">
                    <?php $aleatorio = rand(0, $num2 - 1);
                    $perfil = $pessoas[$aleatorio];
                    ?>
                    <?= '<a href="perfil2.php?nome=' . $perfil['us_id'] . '">'; ?>
                    <img src="<?= $perfil['user_perfil']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </a>
                </div>


                <div class="boladinho">
                    <?php $aleatorio = rand(0, $num2 - 1);
                    $perfil2 = $pessoas[$aleatorio];
                    ?>
                    <?= '<a href="perfil2.php?nome=' . $perfil2['us_id'] . '">'; ?>
                    <img src="<?= $perfil2['user_perfil']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>


                <div class="boladinho">
                    <?php $aleatorio = rand(0, $num2 - 1);
                    $perfil3 = $pessoas[$aleatorio];
                    ?>
                    <?= '<a href="perfil2.php?nome=' . $perfil3['us_id'] . '">'; ?>
                    <img src="<?= $perfil3['user_perfil']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>


                <div class="boladinho">
                <?php $aleatorio = rand(0, $num2 - 1);
                    $perfil4 = $pessoas[$aleatorio];
                    ?>
                    <?= '<a href="perfil2.php?nome=' . $perfil4['us_id'] . '">'; ?>
                    <img src="<?= $perfil4['user_perfil']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>
            </div>
        </div>

        <div class="tamanhoCarrosel">
            <div class="corpo">
                <div class="alinhamento-carousel">
                    <div class="carouseu-container">
                        <input type="radio" name="slider" id="item-1" style="display: none;" checked display>
                        <input type="radio" name="slider" id="item-2" style="display: none;">
                        <input type="radio" name="slider" id="item-3" style="display: none;">
                        <div class="cards">
                            <label class="card" for="item-1" id="song-1">
                                <img class="imgCarousel" src="<?php $aleatorio = rand(0, $num - 1);
                                                                $musica = $medias[$aleatorio];
                                                                echo $musica['capa']; ?>" alt="song">
                            </label>
                            <label class="card" for="item-2" id="song-2">
                                <img class="imgCarousel" src="<?php $aleatorio = rand(0, $num - 1);
                                                                $musica2 = $medias[$aleatorio];
                                                                echo $musica2['capa']; ?>" alt="song">
                            </label>
                            <label class="card" for="item-3" id="song-3">
                                <img class="imgCarousel" src="<?php $aleatorio = rand(0, $num - 1);
                                                                $musica3 = $medias[$aleatorio];
                                                                echo $musica3['capa']; ?>" alt="song">
                            </label>
                        </div>
                        <div class="player">
                            <div class="upper-part">
                                <div class="play-icon">
                                    <svg width="20" height="20" fill="#2992dc" stroke="#2992dc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-play" viewBox="0 0 24 24">
                                        <defs />
                                        <path d="M5 3l14 9-14 9V3z" />
                                    </svg>
                                </div>
                                <div class="info-area" id="test">
                                    <label class="song-info" id="song-info-1">
                                        <div class="title"><?= $musica['nome'] ?></div>
                                        <div class="sub-line">
                                            <div class="subtitle"><?php $comando = $db->prepare('SELECT nome FROM usuarios where us_id = :id');
                                                                    $comando->execute([':id' => $musica['fk_usuarios_us_id']]);
                                                                    $artista = $comando->fetchAll(PDO::FETCH_ASSOC);
                                                                    $nome = $artista[0];
                                                                    echo $nome['nome'];  ?></div>
                                            <div class="time">4.05</div>
                                        </div>
                                    </label>
                                    <label class="song-info" id="song-info-2">
                                        <div class="title"><?= $musica2['nome'] ?></div>
                                        <div class="sub-line">
                                            <div class="subtitle"><?php $comando = $db->prepare('SELECT nome FROM usuarios where us_id = :id');
                                                                    $comando->execute([':id' => $musica2['fk_usuarios_us_id']]);
                                                                    $artista = $comando->fetchAll(PDO::FETCH_ASSOC);
                                                                    $nome = $artista[0];
                                                                    echo $nome['nome'];  ?></div>
                                            <div class="time">4.05</div>
                                        </div>
                                    </label>
                                    <label class="song-info" id="song-info-3">
                                        <div class="title"><?= $musica3['nome'] ?></div>
                                        <div class="sub-line">
                                            <div class="subtitle"><?php $comando = $db->prepare('SELECT nome FROM usuarios where us_id = :id');
                                                                    $comando->execute([':id' => $musica3['fk_usuarios_us_id']]);
                                                                    $artista = $comando->fetchAll(PDO::FETCH_ASSOC);
                                                                    $nome = $artista[0];
                                                                    echo $nome['nome'];  ?></div>
                                            <div class="time">4.05</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="progress-bar">
                                <span class="progress"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faixas">

            <p style="font-size: 24pt; font-weight: bold; color: black;">Faixas</p>
            <div class="scrool">
                <div class="quadradinhos">
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                    $musica4 = $medias[$aleatorio];
                                    echo $musica4['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                    $musica5 = $medias[$aleatorio];
                                    echo $musica5['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                    $musica6 = $medias[$aleatorio];
                                    echo $musica6['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                    <div class="quadradinho">
                        <img src="<?php $aleatorio = rand(0, $num - 1);
                                    $musica7 = $medias[$aleatorio];
                                    echo $musica7['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
include('includes/footer.php');
?>