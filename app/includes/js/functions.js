$('input').on('change', function () {
    $('body').toggleClass('blue');
});


const imagem = document.getElementById('imgcapa');
const cropper = new Cropper(imagem, function () {

})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#file_upload')
                .attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Player Insert


function readMSC(input) {
    var audioElement = $('#msc_upload')[0]; // Seleciona o elemento de áudio usando [0]
    var imgUp = $('#upMusic');
    var btn_play = $('#btn-play');
    var btn_pause = $('#btn-pause');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            audioElement.src = e.target.result; // Atribui a URL do arquivo para o src do elemento de áudio
            imgUp.attr('class', 'iconeUparArquiNone');
            btn_play.attr('class', 'btn-play-insert');

            btn_play.off('click'); // Remove eventos de clique anteriores
            btn_pause.off('click'); // Remove eventos de clique anteriores
            btn_play.on('click', playMusica); // Adiciona evento de clique para o botão play
            btn_pause.on('click', pauseMusica); // Adiciona evento de clique para o botão pause
        }

        reader.readAsDataURL(input.files[0]);

    } else {
        audioElement.pause(); // Pausa a reprodução do áudio
        audioElement.currentTime = 0; // Reinicia o tempo de reprodução
        audioElement.removeAttribute('src'); // Remove a URL do src do elemento de áudio
        imgUp.attr('class', 'iconeUparArqui');
    }

    function playMusica() {
        audioElement.play(); // Inicia a reprodução do áudio
        btn_play.attr('class', 'btn-pause-insert');
        btn_pause.attr('class', 'btn-play-insert');
    }

    function pauseMusica() {
        audioElement.pause(); // Pausa a reprodução do áudio
        btn_play.attr('class', 'btn-play-insert');
        btn_pause.attr('class', 'btn-pause-insert');
    }
}

function changeColor() {
    const selectElement = document.getElementById("mySelect");
    const selectedOption = selectElement.options[selectElement.selectedIndex];

    if (selectedOption) {
        selectElement.classList.add("selected");
    } else {
        selectElement.classList.remove("selected");
    }
}


// carrosel


