<!doctype html>
<html lang="pt-br">

<head>
    <?php
    include_once "./config/constantes.php";
    include_once "./config/conexao.php";
    include_once "./func/dashboard.php";
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.min.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container-fluid">

        <div class="card">
           <div id="showpage">
                <?php include_once './cliente/listarCliente.php'; ?>
            </div>

                <div id="msgGeral"></div>
        </div>
    </div>

    <!-- modal de cadastrar começa aqui -->

    <!-- Modal -->
    <div class="modal fade" id="modalAddCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmAddCliente" class="frmAddCliente" name="frmAddCliente" method="post" action="#">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomeCliente">Cliente</label>
                            <input type="text" class="form-control form-control-sm" id="nomeCliente" name="nomeCliente" placeholder="Nome do Cliente">
                        </div>
                        <div class="form-group">
                            <label for="telefoneCliente">Telefone</label>
                            <input type="text" class="form-control form-control-sm maskCelular" id="telefoneCliente" name="telefoneCliente" placeholder="Digite Número Telefone">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick"></i> Fechar</button>
                        <button type="submit" onclick="addCliente()" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- modal de cadastrar termina aqui -->

    <!-- modal de alterar começa aqui -->

    <!-- Modal -->
    <div class="modal fade" id="modalAltCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Alterar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAltCliente" class="frmAltCliente" name="frmAltCliente" method="post" action="#">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nomeClienteAlt">Cliente</label>
                                <input type="text" class="form-control form-control-sm" id="nomeClienteAlt" name="nomeClienteAlt" placeholder="Nome do Cliente">
                            </div>
                            <div class="form-group">
                                <label for="telefoneClienteAlt">Telefone</label>
                                <input type="text" class="form-control form-control-sm maskCelular" id="telefoneClienteAlt" name="telefoneClienteAlt" placeholder="Digite Número Telefone">
                                <input type="hidden" value="" id="idClienteAlt" name="idClienteAlt">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick"></i> Fechar</button>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Alterar </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- modal de alterar termina aqui -->

    <!-- modal de ativar começa aqui -->

    <!-- Modal -->


    <!-- modal desativar termina aqui -->




    <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/painel.js"></script>
</body>

</html>