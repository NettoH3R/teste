<?php
require './vendor/autoload.php';

use Application\DBConnection\MySQLConnection;

$db = new MySQLConnection();

include('includes/noHeader.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comando = $db->prepare('SELECT * FROM musicas WHERE nome LIKE :nome');
    $comando->execute([":nome" => "%" . $_POST['search'] . "%"]);
    $medias = $comando->fetchAll(PDO::FETCH_ASSOC);
} else {
    if (isset($_GET['id'])) {
        $comando = $db->prepare('SELECT * FROM musicas WHERE fk_usuarios_us_id = :id');
        $comando->execute([":id" => $_GET['id']]);
        $medias = $comando->fetchAll(PDO::FETCH_ASSOC);
        $get = true;
    }
}



?>
<div class="container">
    <main class="main" style="padding-top: 0;">
        <?php foreach ($medias as $m) : ?>
            <div class="row" style="padding-top: 20px; margin-bottom: 20px; text-align: center; align-items: center;">
                <div class="col-md-3">
                    <div style="width: 50px; height: 50px;">
                        <img style=" margin-left: 100px; max-width: 100%; min-width: 100%; max-height: 100%; min-height: 100%;" src="<?= $m['capa'] ?>" alt="">
                    </div>
                </div>
                <div class="col-md-3"><?= $m['nome'] ?></div>
                <div class="col-md-4">

                    <?php
                    if ($get) {
                        $comando = $db->prepare('SELECT * FROM usuarios WHERE us_id = :id');
                        $comando->execute([":id" => $_GET['id']]);
                        $user = $comando->fetchAll(PDO::FETCH_ASSOC);
                        $autor = $user[0];
                        echo '<a style="text-decoration:none" href="perfil2.php?nome=' . $autor['us_id'] . '">'.$autor['nome']. "</a>";
                    } else{
                        $comando = $db->prepare('SELECT * FROM usuarios WHERE us_id = :id');
                        $comando->execute([":id" => $m['fk_usuarios_us_id']]);
                        $user = $comando->fetchAll(PDO::FETCH_ASSOC);
                        $autor = $user[0];
                        echo '<a style="text-decoration:none" href="perfil2.php?nome=' . $autor['us_id'] . '">'.$autor['nome']. "</a>";
                    }

                    ?>

                </div>
            </div>
        <?php endforeach ?>
    </main>
</div>


<?php
include('includes/footer.php');
?>