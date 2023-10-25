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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $capa = $_FILES['img'];

    $filePath = $capa['tmp_name'];

    $nome = $_POST['nome'] . 'user';

    //caminho música

    $pasta = 'artistas/imagensArtistas/';

    $extencao = $capa['name'];
    $extencao = strtolower(pathinfo($extencao, PATHINFO_EXTENSION));
    $pathPerf = $pasta . $nome . "." . $extencao;

    move_uploaded_file($capa['tmp_name'], $pathPerf);

    $comando = $db->prepare('UPDATE usuarios SET user_perfil = :foto , nome = :newnome WHERE us_id = :id');
    $comando->execute([":foto" => $pathPerf, ":newnome" => $_POST['nome'], ":id" => $user['us_id']]);
}


include('includes/noHeader.php');



?>
<div class="container">

    <main class="main">

        <div style="text-align: center;">

            <h1 style="margin-bottom: 30px;">EDITAR PERFIL</h1>
            <form action="editPerf.php" method="post" enctype="multipart/form-data">
                <div class="imagem-container">
                    <div class="inserirFoto">
                        <label for="upfile1" class="custom-file-input">
                            <img class="iconeCamera" id="file_upload" src="./arquivos/imagensInsert/cameraIcon.png" alt="Selecione uma foto para o álbum">
                            <div class="addFoto">
                                <p>Adicione Uma Foto de Perfil</p>
                            </div>
                            <input name="img" type="file" id="upfile1" class="real-file-input" accept="image/jpeg, image/png" onchange="readURL(this);" required>
                        </label>
                    </div>
                </div>
                <div style="width: 25%; margin-left: 37%; margin-right: 37%;">
                    <input style="border: 2px solid black;" name="nome" type="text" placeholder="Nome de Usuário" value="<?= $user['nome'] ?>" class="nomeDaFaixa" required><br> <br>
                </div>


                <button id="submitButton" class="configButton " type="submit">Salvar</button>
            </form>
        </div>



    </main>
</div>

<?php include('includes/footer.php') ?>