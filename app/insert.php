<?php
require './vendor/autoload.php';

use Application\DBConnection\MySQLConnection;

$db = new MySQLConnection();

$title = "Inserção de Música";

$comando = $db->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);


    if (!isset($_SESSION['user'])) {
        //pega as info de uma session já iniciada em entrar
        session_start();
        $descompactar = $_SESSION['user'];
        $user = $descompactar[0];
        
    }

    include('includes/header.php');
?>

    <div class="container">

        <main class="main">

            <div class="insert">


                <form id="myForm" action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="imagem-container">
                                <div class="inserirFoto">
                                    <label for="upfile1" class="custom-file-input">
                                        <img class="iconeCamera" id="file_upload" src="./arquivos/imagensInsert/cameraIcon.png" alt="Selecione uma foto para o álbum">
                                        <div class="addFoto">
                                            <p>Adicione Uma Foto</p>
                                        </div>
                                        <input name="img" type="file" id="upfile1" class="real-file-input" accept="image/jpeg, image/png" onchange="readURL(this);" required>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <input name="nome" type="text" placeholder="Nome da Faixa" class="nomeDaFaixa" required> <br> <br>

                            <select name="genero" id="mySelect" onchange="changeColor()" class="selectGeneros" required>
                                <option value="" disabled selected hidden>Gêneros</option>
                                <?php
                                foreach ($generos as $g) {
                                    echo '<option value="' . $g["gn_nome"] . '">' . $g["gn_nome"] . '</option>';
                                }
                                ?>
                            </select> <br>
                        </div>

                        <div class="col-md-4">
                            <div class="imagem-container">
                                <div class="inserirArquivo">
                                    <div class="custom-file-input2">


                                        <div id="btn-play" class="btn-pause-insert">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                            </svg>
                                        </div>

                                        <div id="btn-pause" class="btn-pause-insert">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pause-fill" viewBox="0 0 16 16">
                                                <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                                            </svg>
                                        </div>


                                        <audio id="msc_upload">
                                            <!-- O atributo 'src' será atualizado pela função readMSC -->
                                        </audio>

                                        <label for="audioInput">
                                            <img id="upMusic" class="iconeUparArqui" src="./arquivos/imagensInsert/iconeUparArqui.png" alt="Selecione o arquivo da música/projeto musical.">

                                            <div class="addMusica">
                                                <p>Adicione o arquivo de música</p>
                                            </div>
                                        </label>

                                    </div>
                                    <input type="file" id="audioInput" class="real-file-input2" name="music" accept="audio/mpeg, audio/wav, audio/mp3" onchange="readMSC(this);" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row rowEspacinho">
                        <div class="col-md-4">
                            <div class="tituloSelecione">
                                <label for="" style="color: white;">Privacidade da Música:</label>
                            </div>
                            <div class="letrasRadio">
                                <input type="radio" id="radio1" name="rdoPrivac" value="privado" required class="configRadio" checked>
                                <label for="radio1" style="color: white;">Privada</label>
                            </div>
                            <div class="letrasRadio">
                                <input type="radio" id="radio2" name="rdoPrivac" value="publico" class="configRadio">
                                <label for="radio2" style="color: white;">Pública</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <textarea name="descricao" id="" class="descricao" placeholder="Descrição" style="resize: none;"></textarea><br>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 text-center">
                            <button id="submitButton" class="configButton " type="submit">Enviar</button>
                        </div>
                    </div>
                </form>

                <!-- MENSAGEM DE FALTA DE PREENCHIMENTO -->

                <div id="warningMessage">Preencha todos os campos obrigatórios: Foto, Nome, Gênero, Arquivo e Privacidade.</div>


                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const form = document.getElementById("myForm");
                        const submitButton = document.getElementById("submitButton");
                        const warningMessage = document.getElementById("warningMessage");

                        submitButton.addEventListener("click", function(event) {
                            const requiredInputs = form.querySelectorAll("[required]");
                            let missingFields = [];

                            for (const input of requiredInputs) {
                                if (!input.value.trim()) {
                                    missingFields.push(input); // Adiciona o campo à lista
                                }
                            }

                            if (missingFields.length > 0) {
                                event.preventDefault(); // Impede o envio do formulário
                                warningMessage.style.display = "block"; // Exibe a mensagem de aviso
                                setTimeout(function() {
                                    warningMessage.style.display = "none"; // Oculta a mensagem após alguns segundos
                                }, 3000); // Oculta após 3 segundos (ajuste conforme necessário)
                            }
                        });
                    });
                </script>
        </main>
    </div>


<?php
    include('includes/footer.php'); 


//Conexão banco de dados
$musicaInvalida = "<p>O tipo do arquivo de música não é aceito por favor insira um arquivo \".MP3\"</p>" .
    "<br>" . "<br>" . '<a href="insert.php" ><button type="button">Voltar</button></a>';

$fotoInvalida = "<p>O tipo do arquivo da imagem para capa não é aceito por favor insira um arquivo \".jpge\" ou \".png\"</p>" .
    "<br>" . "<br>" . '<a href="insert.php" ><button type="button">Voltar</button></a>';

$falhaDeEnvio = "<p>Falha ao Enviar o arquivo</p>" .
    "<br>" . "<br>" . '<a href="insert.php" ><button type="button">Voltar</button></a>';

$arquivoExistente = 'Já existe um arquivo com esse nome!!!' .
    "<br>" . "<br>" . '<a href="insert.php" ><button type="button">Voltar</button></a>';




if (isset($_FILES['music']) && isset($_FILES['img'])) {

    $musica = $_FILES['music'];

    $capa = $_FILES['img'];

    $allowedTypes = array('audio/mpeg', 'audio/mp3');
    $fileType = mime_content_type($musica['tmp_name']);

    if (in_array($fileType, $allowedTypes)) {

        $filePath = $capa['tmp_name']; // Substitua pelo caminho do seu arquivo

        // Use @ antes da função para suprimir os erros caso a função não possa determinar o tipo do arquivo
        $imageInfo = @getimagesize($filePath);


        if ($imageInfo !== false) {

            $nome = $_POST['nome'];

            //caminho música

            $pasta = 'artistas/mscArtistas/';

            $extencao = $musica['name'];
            $extencao = strtolower(pathinfo($extencao, PATHINFO_EXTENSION));
            $pathMusica = $pasta . $nome . "." . $extencao;

            //caminho capa

            $pasta = 'artistas/imagensArtistas/';

            $extencao = $capa['name'];
            $extencao = strtolower(pathinfo($extencao, PATHINFO_EXTENSION));
            $pathCapa = $pasta . $nome . "." . $extencao;

            //Consulta os arquivos do banco de dados 
            $comando = $db->prepare('SELECT * FROM musicas');
            $comando->execute();
            $medias = $comando->fetchAll(PDO::FETCH_ASSOC);


            //verifica se não tem nenhum arquivo com o mesmo nome
            foreach ($medias as $m) {
                if ($m['arquivo'] == $pathMusica) {
                    die($arquivoExistente);
                }
            }

            $deu_certo = move_uploaded_file($musica['tmp_name'], $pathMusica);

            move_uploaded_file($capa['tmp_name'], $pathCapa);

            if ($deu_certo) {
                if ($deu_certo) {
                    //Salva no banco de dados
                    $comando = $db->prepare('INSERT INTO musicas(nome, genero, caminho, capa, privacidade, descricao, fk_usuarios_us_id)
                    VALUES (:nome, :genero, :caminho, :capa, :privacidade, :descricao, :id)');

                    $comando->execute([
                        ':nome' => $nome, ':genero' => $_POST['genero'], ':caminho' => $pathMusica,
                        ':capa' => $pathCapa, ':privacidade' => $_POST['rdoPrivac'], ':descricao' => $_POST['descricao'],
                        ':id' => $user['us_id']
                    ]);
                } else {
                    die($falhaDeEnvio);
                }
            }
        } else {
            // A função getimagesize() não conseguiu determinar que o arquivo é uma imagem
            die($fotoInvalida);
        }
    } else {
        die($musicaInvalida);
    }
}



?>