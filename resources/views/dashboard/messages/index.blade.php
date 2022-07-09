@extends('layouts.master2')

@section('title', 'Admin')

@section('content')



                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <!-- Form de busca ##############################-->
                        <form action="/dashboard/messages" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" id="search" name="search" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"> Buscar</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if($search)
                        <h6>Buscando por: {{ $search }}</h6>
                        @else

                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                        @endif
                        <!-- Fim da busca ###############################-->


                    </div>
                   <div class="text-center"> <h1 class="h3 mb-0 text-gray-800"><b>Mensagens<br><br></b></h1></div>

                    <!-- Tabela ############ -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Todas as Mensagens</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Assunto</th>
                                            <th>Mensagem</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Assunto</th>
                                            <th>Mensagem</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($messages3 as $message3)
                                        <tr>
                                            <td>{{ $message3->nome }}</td>
                                            <td>{{ $message3->email }}</td>
                                            <td>{{ $message3->assunto }}</td>
                                            <td>{{ $message3->mensagem }}</td>

                                            <td>
                                            <form action="/dashboard/messages/{{ $message3->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger delete-btn">
                                                    <ion-icon name="trash-outline"></ion-icon>Excluir</button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
