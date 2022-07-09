@extends('layouts.master2')

@section('title', 'Admin')

@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="{{ url('/dashboard/categorias')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Voltar</a>
                    </div>


                   <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <div class="col-lg-7">
                                    <div class="text-center"> <h1 class="h3 mb-0 text-gray-800"><b>Adicionar nova categoria<br><br></b></h1></div>
                                    <div class="">
                                        <form action="/categorias" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control form-control-user" name="nome" id="nome"
                                                    placeholder="Ação" required>
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
