<?php
require './vendor/autoload.php';

use Application\DBConnection\MySQLConnection;

$db = new MySQLConnection();

$title = "Início";


if (!isset($_SESSION['user'])) {
    //pega as info de uma session já iniciada em entrar
    session_start();

    $descompactar = $_SESSION['user'];
    $user = $descompactar[0];
}


$comando = $db->prepare('SELECT * FROM musicas');
$comando->execute();
$medias = $comando->fetchAll(PDO::FETCH_ASSOC);




$num = count($medias);

include("includes/header.php");

$aleatorio = rand(0, $num - 1);
$musica = $medias[$aleatorio];

$aleatorio = rand(0, $num - 1);
$musica2 = $medias[$aleatorio];

$aleatorio = rand(0, $num - 1);
$musica3 = $medias[$aleatorio];

?>
<div class="container">
    <main class="main">
        <div class="tamanhoCarrosel">
            <div class="corpo">
                <div class="alinhamento-carousel">
                    <div class="carouseu-container">
                        <input type="radio" name="slider" id="item-1" style="display: none;" checked>
                        <input type="radio" name="slider" id="item-2" style="display: none;">
                        <input type="radio" name="slider" id="item-3" style="display: none;">
                        <audio id="music-1" src="<?= $musica['caminho'] ?>"></audio>
                        <audio id="music-2" src="<?= $musica2['caminho'] ?>"></audio>
                        <audio id="music-3" src="<?= $musica3['caminho'] ?>"></audio>
                        <div class="cards">

                            <label class="card" for="item-1" id="song-1">
                                <img class="imgCarousel" src="<?= $musica['capa']; ?>" alt="song">
                                <!-- BOTÕES -->
                                <div id="play-car" class="play-car">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </div>
                                <div id="pause-car" class="pause-car">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                                    </svg>
                                </div>

                            </label>

                            <label class="card" for="item-2" id="song-2">
                                <!-- BOTÕES -->
                                <div id="play-car2" class="play-car">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </div>
                                <div id="pause-car2" class="pause-car">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                                    </svg>
                                </div>
                                <img class="imgCarousel" src="<?= $musica2['capa']; ?>" alt="song">
                            </label>


                            <label class="card" for="item-3" id="song-3">
                                <!-- BOTÕES -->
                                <div id="play-car3" class="play-car">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </div>
                                <div id="pause-car3" class="pause-car">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                                    </svg>
                                </div>
                                <img class="imgCarousel" src="<?= $musica3['capa']; ?>" alt="song">
                            </label>
                        </div>
                        <div class="player">
                            <div class="upper-part">
                                <div class="info-area" id="test">
                                    <label class="song-info" id="song-info-1">
                                        <div class="title"><?= $musica['nome'] ?></div>
                                        <div class="sub-line">
                                            <div class="subtitle"><?php $comando = $db->prepare('SELECT nome FROM usuarios where us_id = :id');
                                                                    $comando->execute([':id' => $musica['fk_usuarios_us_id']]);
                                                                    $artista = $comando->fetchAll(PDO::FETCH_ASSOC);
                                                                    $nome = $artista[0];
                                                                    echo $nome['nome'];  ?></div>
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
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
            var play_car = $('#play-car');
            var pause_car = $('#pause-car');

            var play_car2 = $('#play-car2');
            var pause_car2 = $('#pause-car2');

            var play_car3 = $('#play-car3');
            var pause_car3 = $('#pause-car3');

            $(document).ready(function() {
                // Obtenha uma referência ao elemento de áudio usando o ID
                var audioElement = $('#music-1')[0];

                // Para reproduzir o áudio
                play_car.on('click', playAudio);
                pause_car.on('click', pauseAudio);

                var audioElement2 = $('#music-2')[0];

                // Para reproduzir o áudio
                play_car2.on('click', playAudio2);
                pause_car2.on('click', pauseAudio2);

                var audioElement3 = $('#music-3')[0];

                // Para reproduzir o áudio
                play_car3.on('click', playAudio3);
                pause_car3.on('click', pauseAudio3);

                function playAudio() {
                    audioElement.play();
                    play_car.attr('class', 'pause-car')
                    pause_car.attr('class', 'play-car')
                }

                function playAudio2() {
                    audioElement2.play();
                    play_car2.attr('class', 'pause-car')
                    pause_car2.attr('class', 'play-car')
                }

                function playAudio3() {
                    audioElement3.play();
                    play_car3.attr('class', 'pause-car')
                    pause_car3.attr('class', 'play-car')
                }

                function pauseAudio() {
                    audioElement.pause();
                    play_car.attr('class', 'play-car')
                    pause_car.attr('class', 'pause-car')
                }

                function pauseAudio2() {
                    audioElement2.pause();
                    play_car2.attr('class', 'play-car')
                    pause_car2.attr('class', 'pause-car')
                }

                function pauseAudio3() {
                    audioElement3.pause();
                    play_car3.attr('class', 'play-car')
                    pause_car3.attr('class', 'pause-car')
                }
            });
        </script>

        <!-- MÚSICAS -->


        <div class="scrool">
            <div class="quadradinhos">
                <div class="quadradinho">
                    <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica4 = $medias[$aleatorio];
                                echo $musica4['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>
                <div class="infoQuad">
                    <p class="">Qeuqhehqehqe</p>
                    <p>asdjhlashd</p>
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

        <div class="scrool">
            <div class="quadradinhos">
                <div class="quadradinho">
                    <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica8 = $medias[$aleatorio];
                                echo $musica8['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>
                <div class="quadradinho">
                    <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica9 = $medias[$aleatorio];
                                echo $musica9['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>
                <div class="quadradinho">
                    <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica10 = $medias[$aleatorio];
                                echo $musica10['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>
                <div class="quadradinho">
                    <img src="<?php $aleatorio = rand(0, $num - 1);
                                $musica11 = $medias[$aleatorio];
                                echo $musica11['capa']; ?>" class="album" alt="Possível álbum a ser colocado">
                </div>
            </div>
        </div>

    </main>
</div>

<?php

include('includes/footer.php');
?>