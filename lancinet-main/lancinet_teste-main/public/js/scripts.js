$(document).ready(function() {

    $.ajax({
        url: '/dados',
        type: 'GET',
        success: function(response) {
            var media = parseFloat(response.media_valor);
            var soma = parseFloat(response.soma_valor);

            var media = media.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            var soma = soma.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

            $('#mediaValor').text(media);
            $('#somaValor').text(soma);
        }
    });


    $('#tabela_produtos').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/api/produtos",
            "type": "GET",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "nome_produto" },
            { "data": "nome_marca" },
            { "data": "fabricante" },
            { "data": "estoque" },
            { "data": "nome_cidade" },
            { "data": "valor_produto" }

        ]
    });


    $('#lista_produtos').off('click').on('click', function(e) {

        if ($.fn.DataTable.isDataTable('#table_produtos')) {
            $('#table_produtos').DataTable().destroy();
        }

        $('#table_produtos').DataTable({
        
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/api/produtos",
                "type": "GET",
                "dataSrc": function (json) {
                    return json.data;
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "nome_produto" },
                { "data": "nome_marca" },
                { "data": "fabricante" },
                { "data": "estoque" },
                { "data": "nome_cidade" },
                { "data": "valor_produto" }
    
            ]
        });
    });


    $('#btn_pesquisar').off('click').on('click', function(e) {

        if ($.fn.DataTable.isDataTable('#table_pesquisa')) {
            $('#table_pesquisa').DataTable().destroy();
        }

        var id = $('#pesquisa').val(); 

        function isInteger(value) {
            return /^\d+$/.test(value);
        }

        if (isInteger(id)) {
            var url = '/api/campos/buscar?id='+id;
        } else {
            var url = '/api/campos/buscar?nome_produto='+id;
        }

        $('#table_pesquisa').DataTable({
        
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": url,
                "type": "GET",
                "dataSrc": function (json) {
                    return json.data;
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "nome_produto" },
                { "data": "nome_marca" },
                { "data": "fabricante" },
                { "data": "estoque" },
                { "data": "nome_cidade" },
                { "data": "valor_produto" }
            ],
            "searching": false,
            "paging": false
        });
    });


    $('#salvar_produto').off('click').on('click', function(e) {
        e.preventDefault(); 

        var nome = $('#nome').val().toLowerCase(); 
        var preco = $('#preco').val(); 
        var marca = $('#marca').val().toLowerCase(); 
        var fabricante = $('#fabricante').val().toLowerCase(); 
        var estoque = $('#estoque').val(); 
        var cidade = $('#cidade').val().toLowerCase(); 

        preco = preco.replace(',', '.');

        // Verificar se as variáveis estão vazias
        if (!nome || !preco || !marca || !fabricante || !estoque || !cidade) {      
            Swal.fire({
                title: 'Atenção',
                text: 'Por favor, preencha todos os campos obrigatórios.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
            return;
        }

        consultarProduto(nome) 
        .then(function(message) {
            var msg = message.split('&');

            if(msg[0]=='ok'){

                var qtd_produtos = msg[1];  

                consultarMarca(marca) 
                .then(function(message) {
        
                    if(message=='ok' && qtd_produtos>1){                                        
                        //marca existe

                        Swal.fire({
                            title: 'Atenção',
                            text: 'Produto e Marca já existem.',
                            icon: 'danger',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                        return;

                    }else{
                        // marca não existe
                              
                        consultarCidade(cidade) 
                        .then(function(message) {
                
                            var msg = message.split('&');
                            var id_cidade = msg[1];                    

                            if(msg[0]=='ok'){                          
                                id_cidade = msg[1];

                            }else{
                                // cidade não existe

                                salvarCidade(cidade) 
                                .then(function(message) {
                                    var msg = message.split('&');
                                    if(msg[0]=='ok'){
                                        var msg = message.split('&');
                                        id_cidade = msg[1];
                                        // console.log('ID NOVA CIDADE:'+id_cidade);

                                    }
                                })
                                .catch(function(error) {
                                    console.error(error);
                        
                                    Swal.fire({
                                        title: "Ops! Algo deu errado",
                                        text: error,
                                        icon: "error"
                                    }); 
                                }); 
                            }

                            salvarMarca(marca, fabricante) 
                            .then(function(message) {

                                var msg = message.split('&');

                                var id_marca = msg[1];

                                if(msg[0]=='ok'){
                               
                                    salvarProduto(nome, preco, estoque, id_marca, id_cidade) 
                                    .then(function(message) {

                                        var msg = message.split('&');

                                        if(msg[0]=='ok'){
                                            Swal.fire({
                                                title: 'Concluído',
                                                text: 'Produto criado com sucesso!.',
                                                icon: 'success',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                // Limpar os campos do formulário
                                                $('#form_produto')[0].reset();

                                                if (result.isConfirmed) {
                                                    return location.reload();
                                                }
                                            });
                                        }
        
                                    }).catch(function(error) {
                                        console.error(error);
                            
                                        Swal.fire({
                                            title: "Ops! Algo deu errado",
                                            text: error,
                                            icon: "error"
                                        }); 
                                    }); 
                                }
                            }).catch(function(error) {
                                    console.error(error);
                        
                                    Swal.fire({
                                        title: "Ops! Algo deu errado",
                                        text: error,
                                        icon: "error"
                                    }); 
                            }); 
                        })
                        .catch(function(error) {
                            console.error(error);
                
                            Swal.fire({
                                title: "Ops! Algo deu errado",
                                text: error,
                                icon: "error"
                            }); 
                        }); 
                    }                  
                })
                .catch(function(error) {
                    console.error(error);
        
                    Swal.fire({
                        title: "Ops! Algo deu errado",
                        text: error,
                        icon: "error"
                    }); 
                }); 
            }
        })
        .catch(function(error) {
            console.error(error);

            Swal.fire({
                title: "Ops! Algo deu errado",
                text: error,
                icon: "error"
            }); 
        }); 
    });


    $('#edit_produtos').off('click').on('click', function(e) {

        if ($.fn.DataTable.isDataTable('#table_editar')) {
            $('#table_editar').DataTable().destroy();
        }

        $('#table_editar').DataTable({
        
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/api/produtos",
                "type": "GET",
                "dataSrc": function (json) {
                    return json.data;
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "nome_produto" },
                { "data": "nome_marca" },
                { "data": "fabricante" },
                { "data": "estoque" },
                { "data": "nome_cidade" },
                { "data": "valor_produto" },
                { "data": "marca.id", "visible": false},
                { "data": "cidade.id", "visible": false},
                { // Coluna botão Editar
                    "data": null,
                    "render": function (data, type, row) {
                        return `<button class="btn btn-warning edit-btn" type="button" data-id="${row.id}" 
                                data-nome-produto="${row.nome_produto}" 
                                data-nome-marca="${row.nome_marca}"
                                data-fabricante="${row.fabricante}"
                                data-estoque="${row.estoque}"
                                data-nome-cidade="${row.nome_cidade}"
                                data-valor-produto="${row.valor_produto}"
                                data-marca-id="${row.marca.id}"
                                data-cidade-id="${row.cidade.id}">Editar</button>`;
                    },
                    "orderable": false, 
                    "searchable": false
                }
            ]
        });
    });


    $('#excluir_produtos').off('click').on('click', function(e) {

        if ($.fn.DataTable.isDataTable('#table_excluir')) {
            $('#table_excluir').DataTable().destroy();
        }

        $('#table_excluir').DataTable({
        
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/api/produtos",
                "type": "GET",
                "dataSrc": function (json) {
                    return json.data;
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "nome_produto" },
                { "data": "nome_marca" },
                { "data": "fabricante" },
                { "data": "estoque" },
                { "data": "nome_cidade" },
                { "data": "valor_produto" },
                { "data": "marca.id", "visible": false},
                { "data": "cidade.id", "visible": false},
                { // Coluna para  Excluir
                    "data": null, 
                    "render": function (data, type, row) {
                        return `<button class="btn btn-danger delete-btn" type="button" data-id="${row.id}" 
                                data-marca-id="${row.marca.id}" data-cidade-id="${row.cidade.id}">Excluir</button>`;
                    },
                    "orderable": false,  
                    "searchable": false 
                }
            ]
        });
    });


    $('#lista_cidade').off('click').on('click', function(e) {

        if ($.fn.DataTable.isDataTable('#tabela_cidades')) {
            $('#tabela_cidades').DataTable().destroy();
        }

        $('#tabela_cidades').DataTable({

            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/api/cidades",
                "type": "GET",
                "dataSrc": function (json) {
                    return json.data;
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "nome_cidade" }
            ]
        });
    });

    $(document).on('click', '.edit-btn', function() {

        $('#editar_produto').modal('hide');

        var productId = $(this).data('id');
        var nomeProduto = $(this).data('nome-produto');
        var nomeMarca = $(this).data('nome-marca');
        var estoque = $(this).data('estoque');
        var fabricante = $(this).data('fabricante');
        var nomeCidade = $(this).data('nome-cidade');
        var valorProduto = $(this).data('valor-produto');

        var idMarca = $(this).data('nome-marca');
        var idCidade = $(this).data('nome-cidade');

        $('#editModal input[name="produto_id_edit"]').val(productId);
        $('#editModal input[name="nome_edit"]').val(nomeProduto);
        $('#editModal input[name="marca_edit"]').val(nomeMarca);
        $('#editModal input[name="estoque_edit"]').val(estoque);
        $('#editModal input[name="fabricante_edit"]').val(fabricante);
        $('#editModal input[name="cidade_edit"]').val(nomeCidade);
        $('#editModal input[name="preco_edit"]').val(valorProduto);

        $('#editModal input[name="marca_id_edit"]').val(idMarca);
        $('#editModal input[name="cidade_id_edit"]').val(idCidade);

        $('#editModal').modal('show');     

    });


    $(document).on('click', '.delete-btn', function() {

        var productId = $(this).data('id');
        var marcaId = $(this).data('marca-id');
        var cidadeId = $(this).data('cidade-id');        
                                                                
        Swal.fire({
            title: 'Atenção',
            text: 'Deseja excluir o produto: ' + productId,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            if (result.isConfirmed) {      
  
                excluirProduto(productId) 
                .then(function(message) {   

                    if(message=='ok'){

                        verificarCampo('1',cidadeId) 
                        .then(function(message) {
    
                            if(message=='ok'){
                                
                                excluirCidade(cidadeId) 
                                .then(function(message) {
            
                                    if(message!='ok'){
                                    
                                        Swal.fire({
                                            title: "Ops! Algo deu errado",
                                            text: message,
                                            icon: "error"
                                        }); 
                                    }

                                }).catch(function(error) {
                                    console.error(error); // Lida com erros no AJAX
            
                                    Swal.fire({
                                        title: "Ops! Algo deu errado",
                                        text: error,
                                        icon: "error"
                                    }); 
                                });   

                            }

                               
                            verificarCampo('2',marcaId) 
                            .then(function(message) {
        
                                if(message=='ok'){

                                    excluirMarca(marcaId) 
                                    .then(function(message) {
            
                                        if(message=='ok'){
                                            Swal.fire({
                                                title: "Concluído",
                                                text: "Produto excluído com sucesso!",
                                                icon: "success"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    return location.reload();
                                                }
                                            });
                                        }else{
                                            Swal.fire({
                                                title: "Ops! Algo deu errado",
                                                text: message,
                                                icon: "error"
                                            }); 
                                        }
        
                                    }) .catch(function(error) {
                                        console.error(error);
                
                                        Swal.fire({
                                            title: "Ops! Algo deu errado",
                                            text: error,
                                            icon: "error"
                                        }); 
                                    });
        
                                }
                            }).catch(function(error) {
                                console.error(error);
        
                                Swal.fire({
                                    title: "Ops! Algo deu errado",
                                    text: error,
                                    icon: "error"
                                }); 
                            });   
                    
                        }).catch(function(error) {
                            console.error(error);
        
                            Swal.fire({
                                title: "Ops! Algo deu errado",
                                text: error,
                                icon: "error"
                            }); 
                        });
                 
                    }else{
                        Swal.fire({
                            title: "Ops! Algo deu errado",
                            text: message,
                            icon: "error"
                        }); 
                    }
                })
                .catch(function(error) {
                    console.error(error);

                    Swal.fire({
                        title: "Ops! Algo deu errado",
                        text: error,
                        icon: "error"
                    }); 
                });                  
            }
        });
    });
    
    $('#btn_editar_produto').off('click').on('click', function(e) {
        e.preventDefault(); 

        var id_produto = $('#produto_id_edit').val(); 
        var nome = $('#nome_edit').val().toLowerCase();
        var preco = $('#preco_edit').val(); 

        var preco = parseFloat(preco);

        var marca = $('#marca_edit').val().toLowerCase(); 
        var fabricante = $('#fabricante_edit').val().toLowerCase(); 
        var estoque = $('#estoque_edit').val(); 
        var cidade = $('#cidade_edit').val();     
        
        // Verificar se as variáveis estão vazias
        if (!nome || !preco || !marca || !fabricante || !estoque || !cidade) {
                    
            Swal.fire({
                title: 'Atenção',
                text: 'Por favor, preencha todos os campos obrigatórios.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
            return;
        }

        consultarProduto(nome) 
        .then(function(message) {

            var msg = message.split('&');

            if(msg[0]=='ok'){
                var qtd_produtos = msg[1];               

                consultarMarca(marca, fabricante) 
                .then(function(message) {
        
                    if(message=='ok' && qtd_produtos>1){ 
                        
                        //marca e fábrica existem
            
                        Swal.fire({
                            title: 'Erro ao editar',
                            text: 'Produto já existe. Edite o produto certo para evitar duplicações.',
                            icon: 'info',
                            confirmButtonText: 'OK'
                        });
                        return;
                
                    } else{
                        // marca e fábrica não existem

                        salvarMarca(marca, fabricante) 
                        .then(function(message) {

                            msg = message.split('&');

                            var id_marca = msg[1];

                            if(msg[0]=='ok'){
                                                    
                                consultarCidade(cidade) 
                                .then(function(message) {
                        
                                    var msg = message.split('&');
                                    var id_cidade;

                                    if(msg[0]=='ok'){

                                        //cidade existe
                                        id_cidade = msg[1];
                                        var resultado = editarProduto(id_produto, nome, preco, estoque, id_marca, fabricante, id_cidade);
                                        return;

                                    }else{
                                        //cidade não existe

                                        salvarCidade(cidade) 
                                        .then(function(message) {
                                
                                            var msg = message.split('&');
                                            var id_cidade = msg[1];                                  

                                            var resultado = editarProduto(id_produto, nome, preco, estoque, id_marca, fabricante, id_cidade);
                                        
                                            return;  


                                        }).catch(function(error) {
                                            console.error(error);
                            
                                            Swal.fire({
                                                title: "Ops! Algo deu errado",
                                                text: error,
                                                icon: "error"
                                            }); 
                                        })
                                    };
                                }).catch(function(error) {
                                    console.error(error);
                            
                                    Swal.fire({
                                        title: "Ops! Algo deu errado",
                                        text: error,
                                        icon: "error"
                                    }); 
                                }); 
                            }
                        
                        }).catch(function(error) {
                            console.error(error);
                
                            Swal.fire({
                                title: "Ops! Algo deu errado",
                                text: error,
                                icon: "error"
                            }); 
                        }); 
                    }
                }).catch(function(error) {
                    console.error(error);

                    Swal.fire({
                        title: "Ops! Algo deu errado",
                        text: error,
                        icon: "error"
                    }); 
                }); 

            }
        }).catch(function(error) {
            console.error(error);

            Swal.fire({
                title: "Ops! Algo deu errado",
                text: error,
                icon: "error"
            }); 
        });
    });
    

    const btn_icon_lista = document.getElementById('btn_listar_produtos');
    const btn_left_lista = document.getElementById('lista_produtos');
    
    const btn_icon_edita = document.getElementById('btn_icon_editar');
    const btn_left_edita = document.getElementById('edit_produtos');
    
    const btn_icon_excluir = document.getElementById('btn_icon_excluir');
    const btn_left_excluir = document.getElementById('excluir_produtos');
 
    const btn_icon_cidade = document.getElementById('btn_icon_cidade');
    const btn_left_cidade = document.getElementById('lista_cidade');
    

    btn_icon_lista.addEventListener('click', function() {
        btn_left_lista.click();
    });

    btn_icon_edita.addEventListener('click', function() {
        btn_left_edita.click();
    });

    btn_icon_excluir.addEventListener('click', function() {
        btn_left_excluir.click();
    });

    btn_icon_cidade.addEventListener('click', function() {
        btn_left_cidade.click();
    });

    var input = document.getElementById("pesquisa");

    //redireciona o enter para a pesquisa
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("btn_pesquisar").click();
      }
    });


    // Função para fazer a edição do produto
    function editarProduto(id_produto, nome, preco, estoque, marca_id, fabricante, cidade_id) {
        $.ajax({
            url: '/produtos/' + id_produto,
            type: 'PUT',
            data: {
                nome_produto: nome,
                valor_produto: preco,
                estoque: estoque,
                marca_produto: marca_id,
                fabricante: fabricante,
                cidade: cidade_id,
                _token: $('meta[name="csrf-token"]').attr('content')             
            },
            success: function(response) {

                Swal.fire({
                    title: 'Concluido',
                    text: 'Produto editado com sucesso!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                return;

            },
            error: function() {

                Swal.fire({
                    title: 'Aconteceu algum problema',
                    text: 'Erro ao atualizar o produto.',
                    icon: 'danger',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                return;
            }
        });
    }


    function verificarCampo(tipo='', campo=''){
        return new Promise(function(resolve, reject) {

            const dados = {
                _token: $('meta[name="csrf-token"]').attr('content'), // Token CSRF para segurança
                cidade: tipo === '1' ? campo : '',
                marca_produto: tipo === '2' ? campo : ''
            };

            $.ajax({
                url: '/verificar-produto', 
                type: 'GET',
                data: dados,
                success: function(response) {
                    if (response.message !== 'ok') {
                        resolve("ok");
                    } else {
                        resolve('Nenhuma Campo vinculado');
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro verificar campos.");
                }
            });     
        });
    };


    function consultarProduto(nome_produto){
        return new Promise(function(resolve, reject) {

            $.ajax({
                url: '/consultar-produto', 
                type: 'GET',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),            
                    nome_produto: nome_produto
                },
                success: function(response) {
                    if (response.message !== 'ok') {
                        resolve("Erro: " + response.message);
                    } else {
                        resolve('ok&'+response.total);
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao consultar produto.");
                }
            });     

        });
    };


    function consultarMarca(nome_marca='', fabricante=''){
        return new Promise(function(resolve, reject) {

            $.ajax({
                url: '/buscar-marca', 
                type: 'GET',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),          
                    nome_marca: nome_marca,
                    fabricante: fabricante
                },
                success: function(response) {
                    if (response.message !== 'ok') {
                        resolve("Erro: " + response.message);
                    } else {
                        resolve('ok');
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao consultar produto.");
                }
            });     

        });
    };


    function consultarCidade(nome_cidade){
        return new Promise(function(resolve, reject) {

            $.ajax({
                url: '/buscar-cidade', 
                type: 'GET',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),              
                    nome_cidade: nome_cidade
                },
                success: function(response) {
                    if (response.message !== 'ok') {
                        resolve(" &Erro: " + response.message);
                    } else {
                        resolve('ok&'+response.data[0].id);
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao consultar cidade.");
                }
            });     
        });
    };


    function salvarCidade(nome_cidade){
        return new Promise(function(resolve, reject) {

            $.ajax({
                url: '/salvar-cidade', 
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),            
                    nome_cidade: nome_cidade
                },
                success: function(response) {
    
                    if (response.message !== 'ok') {
                        resolve(" &Erro: " + response.message);
                    } else {
                        resolve('ok&'+response.id);
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao salvar cidade.");
                }
            });     
        });
    };


    function salvarMarca(marca, fabricante){
        return new Promise(function(resolve, reject) {

            $.ajax({
                url: '/salvar-marca', 
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), 
                    nome_marca: marca,
                    fabricante: fabricante
                },
                success: function(response) {
    
                    if (response.message !== 'ok') {
                        resolve(" &Erro: " + response.message);
                    } else {
                        resolve('ok&'+response.id);
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao salvar marca.");
                }
            });     
        });
    };


    function salvarProduto(nome, preco, estoque, id_marca, id_cidade){
        return new Promise(function(resolve, reject) {
            
            var formData = {
                _token: $('meta[name="csrf-token"]').attr('content'), 
                nome_produto: nome,
                valor_produto: preco,                               
                estoque: estoque,
                marca_produto: id_marca,
                cidade: id_cidade
            };

            $.ajax({
                url: '/salvar-produto', 
                type: 'POST',
                data: formData,
                success: function(response) {   
    
                    if (response.message !== 'ok') {
                        resolve(" &Erro: " + response.message);
                    } else {
                        resolve('ok&'+response.id);
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao salvar produto.");
                }
            });     
        });
    };


    function excluirProduto(id) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/produtos/' + id, 
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {

                    if (response.message != 'ok') {
                        resolve("Erro: " + response.message);
                    } else {
                        resolve('ok');
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao excluir o produto.");
                }
            });
        });
    }

    function excluirCidade(id){
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/cidades/' + id, 
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response) {
                    if (response.message !== 'ok') {
                        resolve("Erro: " + response.message);
                    } else {
                        resolve('ok');
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao excluir a cidade.");
                }
            });
        });
    }
    
    function excluirMarca(id){
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/marcas/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.message !== 'ok') {
                        resolve("Erro: " + response.message);
                    } else {
                        resolve('ok');
                    }
                },
                error: function(xhr) {
                    reject("Erro: Ocorreu um erro ao excluir a marca.");
                }
            });
        });
    }
    
});
