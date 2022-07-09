@extends('layouts.master2')

@section('title', 'Admin')

@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="{{ url('/dashboard/games')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Voltar</a>
                    </div>


                   <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <div class="col-lg-7">
                                    <div class="text-center"> <h1 class="h3 mb-0 text-gray-800"><b>Adicionar novo game<br><br></b></h1></div>
                                    <div class="">
                                        <form action="/games" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control form-control-user" name="nome" id="nome"
                                                    placeholder="Fantastic Four" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Categoria:</label>
                                                <select class="form-control" name="categoria" required>
                                                    <option value="categoria">Selecione</option>
                                                    @foreach($categorias as $categoria)
                                                        <option value="{{$categoria->nome}}">{{$categoria->nome}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Arquivo:</label>
                                                <input type="text" class="form-control form-control-user" name="arquivo" id="arquivo"
                                                    placeholder="ISO 320,33" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Link:</label>
                                                <input type="text" class="form-control form-control-user" name="link" id="link"
                                                    placeholder="https://digital/REWS/12345" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Imagem:</label>
                                                <input type="file" class="form-control form-control-user" name="imagem" id="imagem" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Idioma:</label>
                                                <input type="text" class="form-control form-control-user" name="idioma" id="idioma"
                                                    placeholder="Português" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Desenvolvedor:</label>
                                                <input type="text" class="form-control form-control-user" name="desenvolvedor" id="desenvolvedor"
                                                    placeholder="Sony" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Plataforma:</label>
                                                <input type="text" class="form-control form-control-user" name="plataforma" id="plataforma"
                                                    placeholder="Playstation 2" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Senha:</label>
                                                <input type="text" class="form-control form-control-user" name="senha" id="senha"
                                                    placeholder="PS2-Nostalgia" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nome">Data:</label>
                                                <input type="date" class="form-control form-control-user" name="data" id="data" required>
                                            </div>
                                            <hr>
                                            <input type="submit" class="btn btn-primary btn-block" value="Salvar">
                                        </form>
                                    </div>
                                </div>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<!-- ############################### MODAL ###############################-->
    <!-- Logout Modal
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo asset('../admin/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo asset('../admin/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo asset('../admin/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo asset('../admin/js/sb-admin-2.min.js')?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo asset('../admin/vendor/chart.js/Chart.min.js')?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo asset('../admin/js/demo/chart-area-demo.js')?>"></script>
    <script src="<?php echo asset('../admin/js/demo/chart-pie-demo.js')?>"></script>


@endsection
