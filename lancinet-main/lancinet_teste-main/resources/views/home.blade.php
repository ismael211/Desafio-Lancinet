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
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css"> -->

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


    <div id="wrapper">

    
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">LANCINET</div>
            </a>

        
            <hr class="sidebar-divider my-0">

          >
            <hr class="sidebar-divider">

          
            <div class="sidebar-heading">
                Testes Unitários
            </div>

         
            <li class="nav-item">
                <a class="nav-link" type="button" id="lista_produtos" data-toggle="modal" data-target="#listar_produto">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Listar Produtos</span></a>
            </li>

          
            <li class="nav-item">
                <a class="nav-link" type="button" data-toggle="modal" data-target="#pesquisar_produto">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Pesquisar Produto</span></a>
            </li>

 
            <li class="nav-item">
                <a class="nav-link" type="button"  data-toggle="modal" data-target="#add_produto">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Adicionar Produto</span></a>
            </li>

         
            <li class="nav-item">
                <a class="nav-link" type="button" id="edit_produtos" data-toggle="modal" data-target="#editar_produto">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Editar Produto</span></a>
            </li>

     
            <li class="nav-item">
                <a class="nav-link" type="button" id="excluir_produtos" data-toggle="modal"  data-target="#excluir_produto" title="Excluir produto">
                    <i class="fas fa-fw fa-trash"></i>
                    <span>Deletar Produto</span></a>
            </li>


            <hr class="sidebar-divider d-none d-md-block">


            <li class="nav-item">
                <a class="nav-link" id="lista_cidade" type="button" data-toggle="modal" data-target="#listar_cidades">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Listar Cidades</span></a>
            </li>


       
            <hr class="sidebar-divider d-none d-md-block">

         
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
       
        <div id="content-wrapper" class="d-flex flex-column">

      
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <div class="top_align">
                    
                        <a class="btn btn-primary btn-circle" id="btn_listar_produtos" type="button" title="Listar produtos">
                            <i class="fas fa-list"></i>
                        </a>
            
                        <a class="btn btn-success btn-circle" type="button" data-toggle="modal" data-target="#pesquisar_produto" title="Pesquisar produtos">
                            <i class="fas fa-search"></i>
                        </a>
                    
                        <a class="btn btn-info btn-circle" type="button" data-toggle="modal" data-target="#add_produto" title="Adicionar produtos">
                            <i class="fas fa-plus"></i>
                        </a>
                    
                        <a class="btn btn-warning btn-circle" type="button" id="btn_icon_editar" title="Editar produtos">
                            <i class="fas fa-edit"></i>
                        </a>
                            
                        <a class="btn btn-danger btn-circle" type="button" id="btn_icon_excluir" title="Excluir produtos">
                            <i class="fas fa-trash"></i>
                        </a>

                 
                        <hr class="topbar-divider d-none d-md-block">

                        <a class="btn btn-secondary btn-circle" type="button" id="btn_icon_cidade" title="Listar Cidades">
                            <i class="fas fa-fw fa-clipboard-list"></i>
                        </a>
                    
                    </div>             

                </nav>
          
                <div class="container-fluid">

             
                    <h1 class="h3 mb-2 text-gray-800">Produtos</h1>
                    <p class="mb-4">Espaço destinado para listagem de produtos cadastrados.</p>

                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Média Valores dos Produtos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="mediaValor">R$00,00</div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="somaValor">R$000,00</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales  -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Produtos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered produtos" id="tabela_produtos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Marca</th>
                                            <th>Fabricante</th>
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
                                            <th>Fabricante</th>
                                            <th>Estoque</th>
                                            <th>Cidade</th>
                                            <th>Valor</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- TABELA VIA AJAX -->                                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>          

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ismael Henrique - 2024</span>
                    </div>
                </div>
            </footer>

 
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
                                            <table class="table table-bordered" id="table_produtos" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nome</th>
                                                        <th>Marca</th>
                                                        <th>Fabricante</th>
                                                        <th>Estoque</th>
                                                        <th>Cidade</th>
                                                        <th>Valor</th>
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                                                                                                                                  
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
                                                    <input type="text" id="pesquisa" class="form-control bg-light border-0 small" placeholder="Digite o código ou nome do produto"
                                                        aria-label="Search" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="button" id="btn_pesquisar">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><br>
                                    <div class="row" id="resultado_pesquisa">
                                        <div class="col-md-12">

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="table_pesquisa" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Código</th>
                                                            <th>Nome</th>
                                                            <th>Marca</th>
                                                            <th>Fabricante</th>
                                                            <th>Estoque</th>
                                                            <th>Cidade</th>
                                                            <th>Valor</th>
                                                        </tr>
                                                    </thead>                                            
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>                                         
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
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
                            <form id="form_produto">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nome: </label>
                                            <div class="form-group">
                                                <input type="text" id="nome" placeholder="Nome do Produto" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Valor: </label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">R$</span>
                                                    </div>
                                                    <input type="text" id="preco" placeholder="00.00" class="form-control" />
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Marca: </label>
                                            <div class="form-group">
                                                <input type="text" id="marca" placeholder="Marca do Produto" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Estoque: </label>
                                            <div class="form-group">
                                                <input type="number" id="estoque" placeholder="Quantidade em Estoque" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fabricante: </label>
                                            <div class="form-group">
                                                <input type="text" id="fabricante" placeholder="Fabricante" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cidade: </label>
                                            <div class="form-group">
                                                <input type="text" id="cidade" placeholder="Cidade" class="form-control" />
                                            </div>
                                        </div>
                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-info" id="salvar_produto" data-dismiss="modal">Salvar</button>
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
                                <h4 class="modal-title" id="modal_editar_produtos">Editar Produtos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="row">
                                       
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table_editar" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nome</th>
                                                        <th>Marca</th>
                                                        <th>Fabricante</th>
                                                        <th>Estoque</th>
                                                        <th>Cidade</th>
                                                        <th>Valor</th>
                                                        <th style="display: none;">ID Marca</th> <!-- Coluna oculta -->
                                                        <th style="display: none;">ID Cidade</th> <!-- Coluna oculta -->
                                                        <th>Ação</th>                                                        
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                                                                                                                                                                                 
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                </div>                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        

            <!-- Modal EDITA PRODUTO -->                                        
            <div class="form-modal-ex">                           
                
                <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal_add_produtos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_add_produtos">Editar Produto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="form_editar_produto">
                                <div class="modal-body">
                                    <input type="text" name="produto_id_edit" id="produto_id_edit" hidden>
                                    <input type="text" name="marca_id_edit" id="marca_id_edit" hidden>
                                    <input type="text" name="cidade_id_edit" id="cidade_id_edit" hidden>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nome: </label>
                                            <div class="form-group">
                                                <input type="text" name="nome_edit" id="nome_edit" placeholder="Nome do Produto" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Valor: </label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">R$</span>
                                                    </div>
                                                    <input type="text" name="preco_edit" id="preco_edit" placeholder="00.00" class="form-control" />
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Marca: </label>
                                            <div class="form-group">
                                                <input type="text" name="marca_edit" id="marca_edit" placeholder="Marca do Produto" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Estoque: </label>
                                            <div class="form-group">
                                                <input type="number" name="estoque_edit" id="estoque_edit" placeholder="Quantidade em Estoque" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fabricante: </label>
                                            <div class="form-group">
                                                <input type="text" name="fabricante_edit" id="fabricante_edit" placeholder="Fabricante" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cidade: </label>
                                            <div class="form-group">
                                                <input type="text" name="cidade_edit" id="cidade_edit" placeholder="Cidade" class="form-control" />
                                            </div>
                                        </div>
                                    </div>                                              
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning" id="btn_editar_produto" data-dismiss="modal">Editar</button>
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
                                            <table class="table table-bordered" id="table_excluir" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nome</th>
                                                        <th>Marca</th>
                                                        <th>Fabricante</th>
                                                        <th>Estoque</th>
                                                        <th>Cidade</th>
                                                        <th>Valor</th>
                                                        <th style="display: none;">ID Marca</th> <!-- Coluna oculta -->
                                                        <th style="display: none;">ID Cidade</th> <!-- Coluna oculta -->
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>                                            
                                                <tbody>                                                 
                                                                                                                      
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
                                            <table class="table table-bordered" id="tabela_cidades" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>                                                 
                                                        <th>Cidade</th>                                                       
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                    <!-- Cidades via AJAX -->               
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


    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- CSS do DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- JS do DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>