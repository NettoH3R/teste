<?php
$title = 'Cadastre-se';

require './vendor/autoload.php';

use Application\DBConnection\MySQLConnection;

$db = new MySQLConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['pass'] != $_POST['confirm-pass']) {
        die(header('location:cadastrar.php?erro=true'));
    }


    $comando = $db->prepare('SELECT * FROM usuarios');
    $comando->execute();
    $user_existent = $comando->fetchAll(PDO::FETCH_ASSOC);

    foreach ($user_existent as $us) {
        if ($us['email'] == $_POST['email']) {
            die('Já existe uma conta com esse E-mail <br> <a href="cadastrar.php"><button class="btn-seguir">Voltar<button>');
        }
    }
    
    if($_POST['type'] == "1"){
        $acess = 1;
    }else{
        $acess = 2;
    }

    $comando = $db->prepare('INSERT INTO usuarios(nome, email, senha, nivel_acess) VALUES (:nome, :email, :senha, :nivel_acess)');
    $comando->execute([
        ':nome' => $_POST['user_name'], ':email' => $_POST['email'], ':senha' => $_POST['pass'], ':nivel_acess' => $acess
    ]);

    header('location:entrar.php');
}

if (isset($_GET['erro'])) {
    $erro = 'Falha ao confirmar a Senha';
}



include('includes/noHeader.php');

?>
<div class="container">
    <main class="main" style="width: 100%;">
        <div class="row">
            <div class="col-md-1 col-sm-1">

            </div>

            <!-- IMAGEM DE FUNDO -->

            <div class="col-md-10 backImage col-sm-10">
                <div class="row">


                    <!-- PRIMEIRA METADE -->
                    <div class="col-md-6 quadradoEntrar col-sm-12">
                        <img src="/arquivos/imagensDoSite/logoEntrar.png" alt="" class="logoEntrar">
                    </div>

                    <!-- SEGUNDA METADE -->
                    <div class="col-md-6 quadrado2Entrar col-sm-12">

                        <h2 style="padding-top: 5%; font-size: 24pt; text-align: center; color: white; font-weight: bold;"><?php if (isset($_GET['erro'])) {
                                                                                                                                echo $erro;
                                                                                                                            } else {
                                                                                                                                echo 'Bem Vindo!';
                                                                                                                            } ?></h2>

                        <form action="cadastrar.php" method="post">
                            <input name="user_name" type="text" placeholder="Nome de Usuário" class="nomeDaFaixa" style=" width:80% ;  margin-top: 5%; margin-left: 10%; margin-right: 10%;" required>
                            <input name="email" type="" placeholder="E-mail" class="nomeDaFaixa" style=" width:80% ;  margin-top: 5%; margin-left: 10%; margin-right: 10%;" required>
                            <input name="pass" type="password" placeholder="Senha" class="nomeDaFaixa" style=" width:80% ;  margin-top: 5%; margin-left: 10%; margin-right: 10%;" required>
                            <input name="confirm-pass" type="password" placeholder="Confirme a Senha" class="nomeDaFaixa" style=" width:80% ;  margin-top: 5%; margin-left: 10%; margin-right: 10%;" required>
                            <div style="text-align: center; margin-top: 10px;">
                                <input type="radio" name="type" id="artista" value="2">
                                <label style="color: white;" for="artista">Artista</label>

                                <input type="radio" name="type" id="usuario" value="1" checked>
                                <label style="color: white;" for="usuario">Usuário</label>

                            </div>
                            <button type="submit" class="bnt-entrar-entrar">Cadastre-se</button>
                        </form>

                        <p style="text-align: center; color: white; font-size: 14pt; margin-top: 2%;">Já tem uma conta UnderSounds?</p>
                        <p style="text-align: center; color: white; font-size: 14pt; margin-top: -4%;"><a class="sublinhado" href="entrar.php">ENTRE COM SUA CONTA</a></p>
                    </div>

                </div>
            </div>

            <div class="col-md-1 col-sm-1">

            </div>
        </div>
    </main>
</div>

<div class="container">
    <footer class="footer">
        <h4 class="footerConfig">&copy2023 | UnderSounds | Todos os direitos reservados.</h4>
    </footer>
</div>

</body>

</html>