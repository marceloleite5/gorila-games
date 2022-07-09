<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/media.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>CONTACT | GORILA GAMES</title>
</head>
<body>

    <!--BG-->

    <div class="bg"></div>


    <div class="bg_contact">
        <div class="contact_item">
            <div class="close">
                <a href="/">
                    <i id="close" class="bi bi-arrow-left-circle-fill"></i>
                </a>
            </div>
            <form action="/contatos" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="nome" id="" required autocomplete="off" placeholder="Seu nome"><br><br>
                <input type="email" name="email" id="email" onkeydown="validation()" required autocomplete="off" placeholder="Digita o seu email"><span id="indicador" class="indicador"></span><br><br>
                <input type="text" name="assunto" id="" required autocomplete="off" placeholder="Assunto"><br><br>
                <textarea name="mensagem" id="" cols="30" rows="10" required autocomplete="off" placeholder="Sua mensagem"></textarea><br><br>
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_next" value="https://seulink.digital/PEPYIk">
                <input id="submit" type="submit" value="Enviar a Mensagem">
            </form>

            <main>
                <div class="container-fluid">
                    <div class="text-center">
                        @if(session('msg'))
                        <h2 class="msg">{{ session('msg') }}</h2>
                        @endif

                    </div>
                </div>
            </main>
            <a href="https://wa.me/message/N4L6I252SRWJL1">
                <div class="wtsp">
                    <i class="bi bi-whatsapp"></i>Falar no whatsapp
                </div>
            </a>
        </div>
    </div>

    <script src="assets/js/scriptcopy.js"></script>
</body>
</html>
