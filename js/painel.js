mascaras();

function addCliente() {
    $('#frmAddCliente').on('submit', function (e) {
        e.preventDefault();

        /* variável dados */
        var dados = $(this).serializeArray(); /* serialize - transforma tudo em array */
        dados.push(
            { name: "acao", value: "addCliente" }, /* Adciona no parâmetro acao da variável dados o valor add cliente */
        );

        /* Post ajax começa aqui */
        /* ESTE POST É PADRÃO!!!!! */
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'controle.php', /* enviamos para a página 'controle.php' que decide o que será feito */
            data: dados,
            beforeSend: function (retorno) {
                /* ESTE POST É PADRÃO!!!!! */
                /* Post ajax termina aqui */

            }, success: function (retorno) {
                if (retorno == 'Gravado') {
                    $('#modalAddCliente').modal('hide') /* fechar modal que possui o ID "modalAddCliente" */
                    msgGeral('Cadastrado com sucesso'); /* função de chamar a mensagem de sucesso no meio da tela */
                    $('div#msgGeral').html("<div class='alert alert-success' role='alert'>Cadastrado com Sucesso</div>");
                    listarGeral('listarCliente'); /* Função que chama a página que estiver com o nome dentro do parâmetro */

                    /* função que fecha a mensagem de sucesso na div após 3000 (3 seg) */

                    setTimeout(function () {
                        $('div#msgGeral').html('');
                    }, 3000)
                } else {
                    $('div#msgGeral').html("<div class='alert alert-warning' role='alert'>Erro na Gravação</div>");

                }
            }
        });
    });
}

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */


/* serve somente para a página "Listar Cliente" */

/* function listarCliente(){

    var dados = {
        acao: 'listarCliente',
    }

$.ajax({
    type: 'POST',
    dataType: 'HTML',
    url: 'controle.php',
    data: dados,
    beforeSend: function(retorno){
    }, success: function(retorno){
        $('div#showpage').html(retorno);
    }            
  });

} */



/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* função que envia a página que definimos no parâmetro 'acaopage' */
/* listarGeral('listarEstoque') */
/* listarGeral('listarProduto') */
/* listarGeral('listarCliente') */
function listarGeral(acaopage) { /* Serve para qualquer página pois usamos um parâmetro */
    var dados = {
        acao: acaopage /* acao recebe acaopage - parâmetro definido ao chamar a função - listarGeral(acaopage) - listarGeral('listarCliente') */
    }

    $.ajax({
        type: 'POST',
        dataType: 'HTML',
        url: 'controle.php',/* envio de 'acao' para a página controle */
        data: dados,
        beforeSend: function (retorno) {
        }, success: function (retorno) {
            $('div#showpage').html(retorno);
        }
    });

}

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */


/* Máscara celular */

function mascaras() {
    $('.maskCelular').inputmask({
        mask: "(99)9.9999-9999"
    });
}


/* Mensagem registrado com sucesso */

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

function msgGeral(mensagem) {
    Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: mensagem,
        showConfirmButton: false,
        timer: 1500
    })
}


/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */


function ativarGeral(e, f,  acaopage, pageretorno) {
    if (f == 'ativar') {

        var ativo = 'A';
    } else {

        var ativo = 'D';
    }
        var dados = {
            acao: acaopage,
            id: e,
            a: ativo
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'controle.php',/* envio de 'acao' para a página controle */
            data: dados,
            beforeSend: function (retorno) {
            }, success: function (retorno) {
                if (retorno == 'Atualizado') {
                    if (ativo == 'D') {
                      msgGeral('Desativado!');
                        $('div#msgGeral').html("<div class='alert alert-success' role='alert'>Desativado com Sucesso</div>");
                    } else {
                        msgGeral('Ativado!');
                        $('div#msgGeral').html("<div class='alert alert-success' role='alert'>Ativado com Sucesso</div>");
                    }
                    listarGeral(pageretorno);
                    setTimeout(function () {
                        $('div#msgGeral').html('');
                    }, 3000)
                }
                console.log(retorno);
            }
        });


}

/* minha função EXC */
/* PRECISA PASSAR PARÂMETROS NO BTN EM LISTAR GERAL!!!! */

/* function excGeral(idExc, acaopage, pageretorno, idModal, idbtn){
        var btn = idbtn
        $('#' + btn).on('click', function (){
        var dados= {
            acao: acaopage,
            id: idExc
        }
    
       
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'controle.php',
        data: dados,
        beforeSend: function(retorno){
        }, success: function(retorno){
            if(retorno == 'Deletado'){
                $('#' + idModal).modal('hide')
                msgGeral('Excluido com sucesso'); 
                $('div#msgGeral').html("<div class='alert alert-success' role='alert'>Deletado com Sucesso</div>");
                listarGeral(pageretorno); 
                setTimeout(function () {
                    $('div#msgGeral').html('');
                },  3000)
            }
            console.log(retorno); 
        }            
      });
    });
} */


function deleteGeralMsg(idvar, acaopage, pageretorno, m1, m2, m3, m4, m5) {

    Swal.fire({
        title: m1,
        text: m2,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar'
    }).then((result) => {
        if (result.isConfirmed) {

            var dados = {
                acao: acaopage,
                id: idvar
            }

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }

        $.ajax({
            type: 'POST',
            dataType: 'HTML',
            url: 'controle.php',
            data: dados,
            beforeSend: function (retorno) {
            }, success: function (retorno) {
                $('div#msgGeral').html("<div class='alert alert-success ' role='alert'>Excluído com Sucesso</div>");
                listarGeral(pageretorno);
                Swal.fire(
                    m3,
                    m4,
                    m5
                )
                setTimeout(function () {
                    $('div#msgGeral').html('');
                }, 3000)
            }


        });
    })
}

function dadosCliente(idvar) {
    var dados = {
        acao: 'verDadosCliente',
        id: idvar
    }

    $('#modalAltCliente').modal('show')
    alert(idvar);
    $.ajax({
        type: 'POST',
        dataType: 'HTML',
        url: 'controle.php',
        data: dados,
        beforeSend: function (retorno) {
        }, success: function (retorno) {
            console.log(retorno);
            alert(retorno);

        }


    });
}



function addGeral(idForm, pageacao, idModal, pageretorno) {
    $('#' + idForm).on('submit', function (e) {
        e.preventDefault();

        /* variável dados */
        var dados = $(this).serializeArray(); /* serialize - transforma tudo em array */
        dados.push(
            { name: "acao", value: pageacao }, /* Adciona no parâmetro acao da variável dados o valor add cliente */
        );

        /* Post ajax começa aqui */
        /* ESTE POST É PADRÃO!!!!! */
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'controle.php', /* enviamos para a página 'controle.php' que decide o que será feito */
            data: dados,
            beforeSend: function (retorno) {
                /* ESTE POST É PADRÃO!!!!! */
                /* Post ajax termina aqui */
       
            }, success: function (retorno) {
                if (retorno == 'Gravado') {
                    $('#' + idModal).modal('hide') /* fechar modal que possui o ID "modalAddCliente" */
                    msgGeral('Cadastrado com sucesso'); /* função de chamar a mensagem de sucesso no meio da tela */
                    $('div#msgGeral').html("<div class='alert alert-success' role='alert'>Cadastrado com Sucesso</div>");
                    listarGeral(pageretorno); /* Função que chama a página que estiver com o nome dentro do parâmetro */
                 
                                
                    /* função que fecha a mensagem de sucesso na div após 3000 (3 seg) */
                    setTimeout(function () {
                        $('div#msgGeral').html('');
                    }, 3000)
                } else {
                    $('div#msgGeral').html("<div class='alert alert-warning' role='alert'>Erro na Gravação</div>");

                }
            }
        });
    });
}
