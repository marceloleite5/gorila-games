@extends('layouts.master')

@section('title', 'Britagem')

@section('content')


        <!--RIGHT-->

        <div class="right">

            <!--MOST-->

            <div class="most">
                <div class="title">
                    <h3>Jogos mais procurados</h3>
                </div>
                <div class="most_items">
                    @foreach ($banners as $banner)
                    <div class="most_card">
                        <div class="most_img">
                            <img src="/img/game/{{ $banner->imagem }}"
                            data-informations="Nome do arquivo: {{$banner->nome}} <br>
                            Arquivo: {{$banner->arquivo}} <br>
                            Idioma: {{ $banner->idioma }}  <br>
                            Desenvolvedor: {{ $banner->desenvolvedor }} <br>
                            Plataforma: {{ $banner->plataforma }} "
                            data-download="{{ $banner->link }}"
                            alt="">
                        </div>
                        <div class="most_txt">
                            <p>{{ $banner->nome }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                    <div class="most_direction">
                    <i id="left" class="bi bi-arrow-left"></i>
                    <i id="right" class="bi bi-arrow-right"></i>
                </div>
            </div>

            <!--GAMES-->

            <div class="games">
                <div class="title">
                    <h3>Todos os jogos</h3>
                </div>


                <div class="games_items">
                    @foreach ($games as $game)
                    <div class="game_card {{ $game->categoria }}">
                        <div class="game_img">
                            <img src="/img/game/{{ $game->imagem }}"
                            data-informations="Nome do arquivo: {{ $game->nome }} <br>
                            Arquivo: {{ $game->arquivo }} <br>
                            Data de lançamento:{{ $game->data }} <br>
                            Plataforma:{{ $game->plataforma }} <br>
                            Senha:{{ $game->senha }}"
                            data-download="{{ $game->link }}"
                            alt="">
                        </div>
                        <div class="game_txt">
                            <p>{{ $game->nome }}</p>
                        </div>

                    </div>
                    @endforeach
                    <!--################-->
                </div>
            </div>
        </div>
    </div>

    <!--FOOTER-->



@endsection
