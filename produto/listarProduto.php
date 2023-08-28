<?php

include_once "./config/constantes.php";
include_once "./config/conexao.php";
include_once "./func/dashboard.php";

$retornoListarProduto = listarGeral('idproduto, produto, descricao, valor, cadastro, ativo', 'produto');
if ($retornoListarProduto != 'Vazio') {



?>
    <div class="card-header">
        <i class="mdi mdi-clipboard-multiple"></i> Lista de Produtos
        <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#modalAddProduto"><i class="mdi mdi-layers-plus"></i> Cadastrar Produtos</button>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="10%"><i class="mdi mdi-bash"></i> Cod</th>
                <th scope="col" width="20%"><i class="mdi mdi-rename-box"></i> Produto</th>
                <th scope="col" width="13%"><i class="mdi mdi-card-text"></i> Descrição</th>
                <th scope="col" width="12%"><i class="mdi mdi-cash-check"></i> Valor</th>
                <th scope="col" width="20%"><i class="mdi mdi-clock-time-eight"></i> Cadastro</th>
                <th scope='col' width="15%"><i class="mdi mdi-view-dashboard-outline"></i> Ação</th>
            </tr>
        </thead>
        <?php
        foreach ($retornoListarProduto as $itemListarProduto) {
            $idProduto = $itemListarProduto->idproduto;
            $nomeProduto = $itemListarProduto->produto;
            $descricaoProduto = $itemListarProduto->descricao;
            $valorProduto = $itemListarProduto->valor;
            $cadastroProduto = $itemListarProduto->cadastro;
            $ativoProduto = $itemListarProduto->ativo;

        ?>

            <tbody>
                <tr>
                    <th scope="row"><?php echo $idProduto; ?></th>
                    <td><?php echo $nomeProduto; ?></td>
                    <td><?php echo $descricaoProduto; ?></td>
                    <td><?php echo $valorProduto; ?></td>
                    <td><?php echo $cadastroProduto; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success"><i class='mdi mdi-lock-open'></i> Ativar</button>
                            <button type="button" class="btn btn-primary"><i class="mdi mdi-account-edit"></i> Alterar</button>
                            <button type="button" class="btn btn-danger"><i class="mdi mdi-trash-can"></i> Excluir</button>
                        </div>
                    </td>
                </tr>
            <?php
        }

            ?>
            </tbody>
    </table>











































<?php } ?>