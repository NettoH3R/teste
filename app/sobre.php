<?php
require './vendor/autoload.php';

use Application\DBConnection\MySQLConnection;

$db = new MySQLConnection();

$title = 'Sobre Nós';

if (!isset($_SESSION['user'])) {
    //pega as info de uma session já iniciada em entrar
    session_start();

    $descompactar = $_SESSION['user'];
    $user = $descompactar[0];
}

include('includes/header.php');
?>

<div class="container">
    <main class="main" style="padding-top: 0;">

        <h1 class="text-center" style="padding-top: 50px;font-size: 36pt;margin-bottom: -20px;font-family: 'Rubik', sans-serif;font-weight: bold; color: #ff8f2d; text-shadow: -1.5px -1.5px 1.5px black, 1.5px -1.5px 1.5px black, -1.5px 1.5px 1.5px black, 1.5px 1.5px 1.5px black; justify-content: center; align-items: center;">Sobre Nós</h1>
        <div class="row" style="padding: 0; margin: 0;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="sobreQuadrado">
                    <div class="textSobre">
                        <p class="sobreNos">O projeto<span class="sobreDestaque"> UnderSounds </span> possui como principal propósito <span class="sobreDestaque"> impulsionar a visibilidade e a valorização de artistas independentes e talentos locais, </span> concentrados na vasta região do interior de São Paulo, <span class="sobreDestaque"> especificamente em Palmital </span>. Nossa iniciativa abraça a criação de uma plataforma web inovadora, empregando um conjunto diversificado de linguagens de programação, tais como <span class="sobreDestaque"> PHP, SQL e JavaScript, juntamente com as bases fundamentais de marcação, HTML e CSS. </span></p>
                        <p class="sobreNos">A proposta do <span class="sobreDestaque"> UnderSounds </span> consiste em <span class="sobreDestaque"> fornecer aos artistas um meio eficaz para apresentar suas obras ao público, </span> também na abertura de portas amplas e no despertar de oportunidades colaborativas e de performance. Ao fornecer uma plataforma digital abrangente, <span class="sobreDestaque">aspiramos não só aprofundar o engajamento do público com a riqueza artística local, mas também a incentivar artistas a explorarem seus trilhos criativos. </span></p>
                        <p class="sobreNos">Além disso, nosso projeto deseja <span class="sobreDestaque">divulgar o cenário musical e artístico, contribuindo para a formação de laços culturais mais fortes na comunidade.</span> Por meio da criação de um ambiente digital, desejamos que o <span class="sobreDestaque">UnderSounds</span> desempenhe um papel preponderante <span class="sobreDestaque">em estimular mais indivíduos a embarcar na trajetória musical e artística, enriquecendo assim a cultura da região.</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>

        <h2 class="text-center" style="padding-top: 50px;font-size: 30pt;margin-bottom: -20px;font-family: 'Rubik', sans-serif;font-weight: bold; color: #ff8f2d; text-shadow: -1.5px -1.5px 1.5px black, 1.5px -1.5px 1.5px black, -1.5px 1.5px 1.5px black, 1.5px 1.5px 1.5px black; justify-content: center; align-items: center;">Membros do UnderSounds</h2>

        <div class="row" style="padding: 0; margin: 0;">

            <div class="col-md-4">
                <div class="sobre-quadradinho">
                    <div class="foto-sobre">
                        <img src="arquivos/imagensSobre/ft3.png" class="fotoNossaSobre" alt="Foto do Felipe Siqueira Camargo">
                    </div>

                    <div class="textoSobre">
                        <p><span class="textoSobreBold">Nome:</span> Felipe Siqueira Camargo</p>

                        <p><span class="textoSobreBold">Idade:</span> 18 anos</p>

                        <p><span class="textoSobreBold"> Função:</span> Design</p>

                        <p><span class="textoSobreBold"> Escola:</span> ETEC Mário Antônio Verza</p>

                        <p><span class="textoSobreBold"> Ano escolar:</span> 3° ETIM – Informática para Internet</p>
                    </div>
                </div>
            </div>




            <div class="col-md-4">
                <div class="sobre-quadradinho">
                    <div class="foto-sobre">
                        <img src="arquivos/imagensSobre/ft1.png" class="fotoNossaSobre" alt="Foto do Luan Martins Toniolo">
                    </div>

                    <div class="textoSobre">
                        <p><span class="textoSobreBold">Nome:</span> Luan Martins Toniolo</p>

                        <p><span class="textoSobreBold">Idade:</span> 17 anos</p>

                        <p><span class="textoSobreBold">Função:</span> Desenvolvedor Front-End / Assistente Geral</p>

                        <p><span class="textoSobreBold">Escola:</span> ETEC Mário Antônio Verza</p>

                        <p><span class="textoSobreBold">Ano escolar:</span> 3° ETIM – Informática para Internet</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sobre-quadradinho">
                    <div class="foto-sobre">
                        <img src="arquivos/imagensSobre/ft5.png" class="fotoNossaSobre" alt="Foto do João Victor Netto Araújo">
                    </div>
                    <div class="textoSobre">
                        <p><span class="textoSobreBold">Nome:</span> João Victor Netto Araújo</p>

                        <p><span class="textoSobreBold">Idade:</span> 17 anos</p>

                        <p><span class="textoSobreBold">Função:</span> Desenvolvedor Back-End / Desenvolvedor Front-End / Diretor Geral</p>

                        <p><span class="textoSobreBold">Escola:</span> ETEC Mário Antônio Verza</p>

                        <p><span class="textoSobreBold">Ano escolar:</span> 3° ETIM – Informática para Internet </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding: 0; margin: 0;">

            <div class="col-md-2"></div>

            <div class="col-md-4">
                <div class="sobre-quadradinho">
                    <div class="foto-sobre">
                        <img src="arquivos/imagensSobre/ft2.png" class="fotoNossaSobre" alt="Foto do Renan Costa Leão">
                    </div>
                    <div class="textoSobre">
                        <p><span class="textoSobreBold"> Nome:</span> Renan Costa Leão</p>

                        <p><span class="textoSobreBold">Idade:</span> 18 anos</p>

                        <p><span class="textoSobreBold">Função:</span> Design</p>

                        <p><span class="textoSobreBold">Escola:</span> ETEC Mário Antônio Verza</p>

                        <p><span class="textoSobreBold">Ano escolar:</span> 3° ETIM – Informática para Internet</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sobre-quadradinho">
                    <div class="foto-sobre">
                        <img src="arquivos/imagensSobre/ft4.png" class="fotoNossaSobre" alt="Foto do Miguel Renato Silva Campos">
                    </div>
                    <div class="textoSobre">
                        <p><span class="textoSobreBold">Nome:</span> Miguel Renato Silva Campos</p>

                        <p><span class="textoSobreBold">Idade:</span> 17 anos</p>

                        <p><span class="textoSobreBold">Função:</span> Design</p>

                        <p><span class="textoSobreBold">Escola:</span> ETEC Mário Antônio Verza</p>

                        <p><span class="textoSobreBold">Ano escolar:</span> 3° ETIM – Informática para Internet</p>
                    </div>
                </div>
            </div>


            <div class="col-md-2"></div>
        </div>
    </main>
</div>

<?php
include('includes/footer.php');
?>