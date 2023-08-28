<?php


include_once "./config/constantes.php";
include_once "./config/conexao.php";
include_once "./func/dashboard.php";

$retornoListarCliente = listarGeral('idcliente, nome, telefone, ativo', 'cliente');
if ($retornoListaCliente != 'Vazio') {



?>
    <div class="card-header">
        <i class="mdi mdi-account"></i> Lista de Clientes
        <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#modalAddCliente"><i class="mdi mdi-account-multiple-plus"></i> Cadastrar
            Clientes</button>
    </div>
    <table class="table table-hover">
    <thead>
        <tr class="bg-danger text-white">
            <th scope="col" width="7%"><i class="mdi mdi-bash"></i> Cod</th>
            <th scope="col" width="55%"><i class="mdi mdi-account"></i> Nome</th>
            <th scope="col" width="18%"><i class="mdi mdi-phone"></i> Telefone</th>
            <th scope="col" width="30%"><i class="mdi mdi-view-dashboard-outline"></i> Ação</th>
        </tr>
    </thead>
        <tbody>
            <?php
            foreach ($retornoListarCliente as $itemListarCliente) {
                $idCliente = $itemListarCliente->idcliente;
                $nomeCliente = $itemListarCliente->nome;
                $telefoneCliente = $itemListarCliente->telefone;
                $ativoCliente = $itemListarCliente->ativo;

            ?>
                <tr>
                    <th scope="row"><?php echo $idCliente; ?></th>
                    <td><?php echo $nomeCliente; ?></td>
                    <td><?php echo $telefoneCliente; ?></td>
                    <td>



                        <?php
                        if ($ativoCliente == 'A') {
                        ?> <!-- ativarGeral(e, f, idbtn, acapage) -->
                            <button type='button' class='btn btn-success' onclick="ativarGeral(<?php echo $idCliente ?>, 'desativar', 'ativarCliente', 'listarCliente');"> <i class='mdi mdi-lock-open'></i></button>
                        <?php
                        } else {
                        ?>
                            <button type='button' class='btn btn-dark' onclick="ativarGeral(<?php echo $idCliente ?>, 'ativar', 'ativarCliente',  'listarCliente');"><i class='mdi mdi-lock-check'></i></button>

                        <?php
                        }
                        ?>

                        <div class="btn-group  btn-group-sm" role="group" aria-label="Basic example">

                            <button type="button" class="btn btn-primary" onclick="dadosCliente(<?php echo $idCliente ?>, )"><i class="mdi mdi-account-edit"></i> Alterar</button>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExcCliente" onclick="deleteGeralMsg(<?php echo $idCliente ?>, 'excCliente','listarCliente', 'Tem certeza que deseja excluir este dado?', 'Operação Irreversível', 'Excluído com Sucesso!', 'Prossiga');"><i class="mdi mdi-trash-can"></i> Excluir</button>
                        </div>

                    </td>
                </tr>
        <?php
            }
        } 
        ?>

        </tbody>
    </table>