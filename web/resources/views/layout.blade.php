<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VetConnect</title>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">


    <!-- Importação da biblioteca de css-->
    <link href="{{ asset('tema_adm/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('tema_adm/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- inclusão de CSS datatables -->
    <link href="cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- inclusão de jquery datatables(tive que comentar o jquery lá em baixo) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"> </script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"> </script>

    <script scr="http://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"> </script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
            $('.mask-cpf').mask('000.000.000-00');
            $('.mask-cnpj').mask('00.000.000/0000-00');
            $('.mask-rg').mask('00.000.000.00');
            $('.mask-cep').mask('00000-000');
            $('.mask-data').mask('dd/mm/aaaa');
            $('.mask-placaCarro').mask('AAA-0A00');
            $('.mask-horasMinutos').mask('00:00');
            $('.mask-cartao').mask('0000 0000 0000');
        </script>

</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="sidebar-brand-text mx-3">VetConnect<sup>ADM</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-home"></i>
                    <span>Tela Inicial</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gerenciar
            </div>

            <li class="nav-item">
                <a class="nav-link" href="/veterinario">
                    <i class="fas fa-user-md"></i>
                    <span>Veterinários</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrar
            </div>

            <!-- Item navergador - Menu Lateral -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-plus"></i>
                    <span>Medicações</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cadastros Principais:</h6>
                        <a class="collapse-item" href="/usuario">Cad. Usuarios</a>
                        <a class="collapse-item" href="../noticia">Cad. Notícias</a>
                    </div>
                </div>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="/medicacao">
                    <i class="fas fa-pills"></i>
                    <span>Medicações</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/vacina">
                    <i class="fas fa-syringe"></i>
                    <span>Vacinas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/cartao_de_vacinacao">
                    <i class="fas fa-paw"></i>
                    <span>Cartões de Vacina</span></a>
            </li>

            <!-- Item navergador - Menu Lateral -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cad. Unitários</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cad. de um registro:</h6>
                        <a class="collapse-item" href="../vendas">Video Principal</a>
                        <a class="collapse-item" href="../vendas">Texto Principal</a>
                    </div>
                </div>
            </li> -->

            <!-- Linha de divisão -->
            <hr class="sidebar-divider">

            <!-- Heading
            <div class="sidebar-heading">
                Adicionais
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Relatórios</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Simples:</h6>
                        <a class="collapse-item" href="#">xxx</a>
                        <a class="collapse-item" href="#">xxx</a>
                        <a class="collapse-item" href="#">xxx</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Avançados:</h6>
                        <a class="collapse-item" href="#">xxx</a>
                        <a class="collapse-item" href="#">xxx</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Gráficos</span></a>
            </li>


            <!-- Divider -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>




        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS)
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('tema_adm/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/login">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Entrar
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                        <!--
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Botão Teste</a>
                        -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Rafael Vidal &copy; VetConnect 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para sair ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clique em "Sair" se você deseja sair.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login.html">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript (comentei pelo datatable)
    <script src="{{ asset('tema_adm/vendor/jquery/jquery.min.js') }}"></script>
    -->

    <script src="{{ asset('tema_adm/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript (comentei pelo datatable)
    <script src="{{ asset('tema_adm/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    -->
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('tema_adm/js/sb-admin-2.min.js')}}"></script>

    <!-- Graficos level plugins
    <script src="{{ asset('tema_adm/vendor/chart.js/Chart.min.js') }}"></script>
    -->

    <!-- Graficos level custom scripts
    <script src="{{ asset('tema_adm/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('tema_adm/js/demo/chart-pie-demo.js') }}"></script>
    -->




</body>
</html>
