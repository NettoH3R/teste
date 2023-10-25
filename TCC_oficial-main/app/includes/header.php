<?php
$comando = $db->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="includes/js/functions.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/style.css">

    <style>
        .tamanhologo {
            max-width: 100%;
            height: 100%;
        }

        .nav-link {
            color: white;
            font-weight: bolder;
        }

        .carousel-caption {
            color: black;
        }

        .nav-link:hover {
            color: #888888;
        }

        .insert {
            background-image: url('arquivos/imagensDoSite/textPura.jpg');
            background-repeat: repeat;
            background-blend-mode: multiply;
        }
    </style>

</head>

<body>
    <main>
        <!-- Cabeçario -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 text-center">
                    </div>
                    <div class="col-md-2 col-sm-12 text-center">
                        <img src="arquivos/imagensDoSite/logo_1finalizada.png" class="tamanhologo" alt="Logo do nosso site">
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-3 col-sm-12 text-center">

                        <?php

                        if ($title == 'Inserção de Música') {
                            echo " ";
                        } elseif ($_SESSION == null) {
                            echo
                            '<a href="entrar.php" style="text-decoration: none; color: white;"><button type="button" class="btn-1">Entrar</button></a>
                        <a href="cadastrar.php" style="text-decoration: none; color: white;"><button type="button" class="btn-2">Cadastrar</button></a>';
                        } else {
                            echo '<a href="perfil.php"><div class="mini-perf">
                            <div class="mini-perf-ft">
                                <img class="album" src="' . $user['user_perfil'] . '" alt="">
                            </div>
                            <div class="mini-perf-nome">
                                <p>
                                    ' . $user['nome'] . '
                                </p>
                            </div>
                        </div></a>';
                        } ?>
                    </div>
                </div>
            </div>
            </div>
        </header>

        <!-- Menu -->
        <div class="container">
            <nav class="navbar navbar-expand-lg" style="background-color: #244bbf; margin-top: 10px;">
                <div class="container-fluid">
                    <a class="navbar-brand" style="font-weight: bolder; color: white; cursor:default" href="index.php"><img src="arquivos/imagensDoSite/logo_minimalista.png" width="90px" height="50px" alt="Logo do nosso site de uma maneira mais simples"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Início</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gêneros
                                </a>
                                <ul class="dropdown-menu">
                                    <?php

                                    foreach ($generos as $g) {
                                        echo '<li><a class="dropdown-item" href="genero.php?genero=' . $g['gn_nome'] . ' ">' . $g['gn_nome'] . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sobre.php">Sobre</a>
                            </li>
                        </ul>
                        <form action="list.php" method="post"  class="d-flex" role="search">
                            <input class="form-control me-2" name="search" type="search" placeholder="Procure a música" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>