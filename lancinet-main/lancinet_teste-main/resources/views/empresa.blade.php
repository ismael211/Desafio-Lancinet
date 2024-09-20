<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->

    <link href="{{ asset('/lancinet/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

    <!-- <link href="{{ asset('/css/sb-admin-2.min.css" rel="stylesheet"') }}"> -->

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css">

    <style>

        .top_align{
    
            display: flex;
            justify-content: center; /* Centraliza os elementos horizontalmente */
            align-items: center;     /* Centraliza os elementos verticalmente */
            gap: 15px;               /* Espaçamento entre os botões */
            height: 50px; 
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">LANCINET</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Testes Unitários
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" type="button" data-toggle="modal" data-target="#listar_produto">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Listar Produtos</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" type="button" data-toggle="modal" data-target="#pesquisar_produto">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Pesquisar Produto</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" type="button"  data-toggle="modal" data-target="#add_produto">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Adicionar Produto</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" type="button" data-toggle="modal" data-target="#editar_produto">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Editar Produto</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" type="button" data-toggle="modal" data-target="#excluir_produto" data-target="#excluir_produto" title="Excluir produto">
                    <i class="fas fa-fw fa-trash"></i>
                    <span>Deletar Produto</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" type="button" data-toggle="modal" data-target="#listar_cidades">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Listar Cidades</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <div class="top_align">
                    
                        <a class="btn btn-primary btn-circle" data-title="Listar Produtos" type="button" data-toggle="modal" data-target="#listar_produto" title="Listar produtos">
                            <i class="fas fa-list"></i>
                        </a>
            
                        <a class="btn btn-success btn-circle" type="button" data-toggle="modal" data-target="#pesquisar_produto" title="Pesquisar produtos">
                            <i class="fas fa-search"></i>
                        </a>
                    
                        <a class="btn btn-info btn-circle" type="button" data-toggle="modal" data-target="#add_produto" title="Adicionar produtos">
                            <i class="fas fa-plus"></i>
                        </a>
                    
                        <a class="btn btn-warning btn-circle" type="button" data-toggle="modal" data-target="#editar_produto" title="Editar produtos">
                            <i class="fas fa-edit"></i>
                        </a>
                            
                        <a class="btn btn-danger btn-circle" type="button" data-toggle="modal" data-target="#excluir_produto" title="Excluir produtos">
                            <i class="fas fa-trash"></i>
                        </a>

                        <!-- Divider -->
                        <hr class="topbar-divider d-none d-md-block">

                        <a class="btn btn-secondary btn-circle" type="button" data-toggle="modal" data-target="#listar_cidades" title="Listar Cidades">
                            <i class="fas fa-fw fa-clipboard-list"></i>
                        </a>
                    
                    </div>             

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">ProdutosSSSSSSSSSSS</h1>
                    <p class="mb-4">Espaço destinado para listagem de produtos cadastrados e cadastro de novos.</p>

                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Média Valores dos Produtos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">R$40,00</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Soma de Todos Produtos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">R$115.000,00</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Lista de Produtos</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabela_produtos" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Marca</th>
                                        <th>Estoque</th>
                                        <th>Cidade</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Marca</th>
                                        <th>Estoque</th>
                                        <th>Cidade</th>
                                        <th>Valor</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>423</td>
                                        <td>Arroz</td>
                                        <td>Tio Urbano</td>
                                        <td>61</td>
                                        <td>Redenção</td>
                                        <td>R$32,80</td>
                                    </tr>
                                    <tr>
                                        <td>374</td>
                                        <td>Macarrão</td>
                                        <td>Benjamin</td>
                                        <td>63</td>
                                        <td>Altamira</td>
                                        <td>R$10,70</td>
                                    </tr>
                                    <tr>
                                        <td>897</td>
                                        <td>Ovo</td>
                                        <td>Sao Francisco</td>
                                        <td>66</td>
                                        <td>Uberaba</td>
                                        <td>R$86,00</td>
                                    </tr>
                                    <tr>
                                        <td>666</td>
                                        <td>Bolacha</td>
                                        <td>Mabel</td>
                                        <td>22</td>
                                        <td>Uberlandia</td>
                                        <td>R$33,60</td>
                                    </tr>                                                                      
                                </tbody>
                            </table>
                        </div>
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
                        <span>Copyright &copy; Ismael Henrique - 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

 
            <!-- Modal LISTAR PRODUTOS -->                    
            <div class="form-modal-ex">                           
                
                <div class="modal fade text-left" id="listar_produto" tabindex="-1" role="dialog" aria-labelledby="modal_listar_produtos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_listar_produtos">Lista de Produtos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="row">
                                       
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nome</th>
                                                        <th>Marca</th>
                                                        <th>Estoque</th>
                                                        <th>Cidade</th>
                                                        <th>Valor</th>
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                    <tr>
                                                        <td>423</td>
                                                        <td>Arroz</td>
                                                        <td>Tio Urbano</td>
                                                        <td>61</td>
                                                        <td>Redenção</td>
                                                        <td>R$32,80</td>
                                                    </tr>
                                                    <tr>
                                                        <td>374</td>
                                                        <td>Macarrão</td>
                                                        <td>Benjamin</td>
                                                        <td>63</td>
                                                        <td>Altamira</td>
                                                        <td>R$10,70</td>
                                                    </tr>
                                                    <tr>
                                                        <td>897</td>
                                                        <td>Ovo</td>
                                                        <td>Sao Francisco</td>
                                                        <td>66</td>
                                                        <td>Uberaba</td>
                                                        <td>R$86,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>666</td>
                                                        <td>Bolacha</td>
                                                        <td>Mabel</td>
                                                        <td>22</td>
                                                        <td>Uberlandia</td>
                                                        <td>R$33,60</td>
                                                    </tr>                                                                      
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        

            <!-- Modal PESQUISAR PRODUTOS -->                    
            <div class="form-modal-ex">                           
                
                <div class="modal fade text-left" id="pesquisar_produto" tabindex="-1" role="dialog" aria-labelledby="modal_pesq_produtos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_pesq_produtos">Pesquisar Produto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- Topbar Search -->
                                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                <div class="input-group">
                                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Digite o código ou nome do produto"
                                                        aria-label="Search" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal ADICIONAR PRODUTO -->                    
            <div class="form-modal-ex">                           
                
                <div class="modal fade text-left" id="add_produto" tabindex="-1" role="dialog" aria-labelledby="modal_add_produtos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_add_produtos">Novo Produto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nome: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Nome do Produto" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Valor: </label>
                                            <div class="form-group">
                                                <input type="password" placeholder="R$00,00" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Marca: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Marca do Produto" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Estoque: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Quantidade em Estoque" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>UF: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Estado" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cidade: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Cidade" class="form-control" />
                                            </div>
                                        </div>
                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

 
            <!-- Modal EDITAR PRODUTOS -->                    
            <div class="form-modal-ex">                           
                
                <div class="modal fade text-left" id="editar_produto" tabindex="-1" role="dialog" aria-labelledby="modal_editar_produtos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_editar_produtos">Lista de Produtos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="row">
                                       
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nome</th>
                                                        <th>Marca</th>
                                                        <th>Estoque</th>
                                                        <th>Cidade</th>
                                                        <th>Valor</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                    <tr>
                                                        <td>423</td>
                                                        <td>Arroz</td>
                                                        <td>Tio Urbano</td>
                                                        <td>61</td>
                                                        <td>Redenção</td>
                                                        <td>R$32,80</td>
                                                        <td><button type="button" class="btn btn-warning" data-toggle="modal">Editar</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>374</td>
                                                        <td>Macarrão</td>
                                                        <td>Benjamin</td>
                                                        <td>63</td>
                                                        <td>Altamira</td>
                                                        <td>R$10,70</td>
                                                        <td><button type="button" class="btn btn-warning" data-toggle="modal">Editar</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>897</td>
                                                        <td>Ovo</td>
                                                        <td>Sao Francisco</td>
                                                        <td>66</td>
                                                        <td>Uberaba</td>
                                                        <td>R$86,00</td>
                                                        <td><button type="button" class="btn btn-warning" data-toggle="modal">Editar</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>686</td>
                                                        <td>Bolacha</td>
                                                        <td>Mabel</td>
                                                        <td>22</td>
                                                        <td>Uberlandia</td>
                                                        <td>R$33,60</td>
                                                        <td><button type="button" class="btn btn-warning" data-toggle="modal">Editar</button></td>
                                                    </tr>                                                                      
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
            
            <!-- Modal EXCLUIR PRODUTOS -->                    
            <div class="form-modal-ex">                           
                
                <div class="modal fade text-left" id="excluir_produto" tabindex="-1" role="dialog" aria-labelledby="modal_excluir_produtos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_excluir_produtos">Lista de Produtos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="row">
                                       
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nome</th>
                                                        <th>Marca</th>
                                                        <th>Estoque</th>
                                                        <th>Cidade</th>
                                                        <th>Valor</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                    <tr>
                                                        <td>423</td>
                                                        <td>Arroz</td>
                                                        <td>Tio Urbano</td>
                                                        <td>61</td>
                                                        <td>Redenção</td>
                                                        <td>R$32,80</td>
                                                        <td><button type="button" class="btn btn-danger" data-toggle="modal">Excluir</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>374</td>
                                                        <td>Macarrão</td>
                                                        <td>Benjamin</td>
                                                        <td>63</td>
                                                        <td>Altamira</td>
                                                        <td>R$10,70</td>
                                                        <td><button type="button" class="btn btn-danger" data-toggle="modal">Excluir</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>897</td>
                                                        <td>Ovo</td>
                                                        <td>Sao Francisco</td>
                                                        <td>66</td>
                                                        <td>Uberaba</td>
                                                        <td>R$86,00</td>
                                                        <td><button type="button" class="btn btn-danger" data-toggle="modal">Excluir</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>686</td>
                                                        <td>Bolacha</td>
                                                        <td>Mabel</td>
                                                        <td>22</td>
                                                        <td>Uberlandia</td>
                                                        <td>R$33,60</td>
                                                        <td><button type="button" class="btn btn-danger" data-toggle="modal">Excluir</button></td>
                                                    </tr>                                                                      
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        

            
            <!-- Modal LISTAR CIDADES -->                    
            <div class="form-modal-ex">                           
                
                <div class="modal fade text-left" id="listar_cidades" tabindex="-1" role="dialog" aria-labelledby="modal_listar_cidades" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_listar_cidades">Cidades Cadastradas</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="row">
                                       
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>                                                 
                                                        <th>Cidade</th>                                                       
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                    <tr>
                                                        <td>61</td>
                                                        <td>Redenção</td>
                                                     </tr>
                                                    <tr>
                                                        <td>374</td>                                                     
                                                        <td>Benjamin</td>
                                                    </tr>
                                                    <tr>
                                                        <td>66</td>
                                                        <td>Uberaba</td>
                                                    </tr>
                                                    <tr>
                                                        <td>22</td>
                                                        <td>Uberlandia</td>
                                                    </tr>                                                                      
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>

    <script>
        $('#tabela_produtos').DataTable();
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>