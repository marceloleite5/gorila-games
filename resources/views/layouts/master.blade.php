<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>GORILA GAMES</title>
</head>
<body>


    <div id="teste" class="teste">
        <span></span>
    </div>


    <!--BG-->

    <div class="bg"></div>

    <!--OVERLAY-->

    <div id="overlay" class="overlay">
        <div class="close">
            <i id="close" class="bi bi-arrow-left-circle-fill"></i>
        </div>
        <div class="ove_infos">
            <div class="infos_img">
                <img src="" alt="">
            </div>
            <div class="infos_txt">
                <p></p>
            </div>
            <div class="download">
                <a href="">
                    <img src="assets/img/download.png" alt="">
                </a>
            </div>
        </div>
    </div>

    <!--NAV-->

    <div class="nav">
        <a href="index.html">
            <div class="logo">
                <img src="assets/img/logo.png" alt="">
                <h1>GORILA GAMES</h1>
            </div>
        </a>
        <div class="show">
            <i id="show" class="bi bi-list"></i>
        </div>
    </div>

    <!--HEADER-->

    <div class="header">

        <!--LEFT-->

        <div class="left">
            <div class="title">
                <h3>Categorias</h3>
            </div>
            <div class="left_items">
                @foreach ($categorias as $categoria)
                <div id="action" class="left_card">
                    <p>{{ $categoria->nome }}</p>
                </div>
                @endforeach
            </div>
        </div>


  <!--########################## Content aqui #############################-->


  @yield('content')

       <!--###################################### FOOTER ##########################################-->
  @extends('layouts.footer')

  </body>
  </html>

