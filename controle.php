<?php 


/* Assim que a página 'addCliente' é incluída a função que está lá dentro já é executada ao incluir a página. */

$caixa = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING); /* $acao recebe */

/* ------------------------------------------- CLIENTE -------------------------------------------*/

switch($caixa){ /* Destila a variável $caixa que recebe as informações do Ajax */
    case 'addCliente'; /* Verifica se a informação que vem no parâmetro 'acao' é igual á 'addCliente' */
        include_once './cliente/addCliente.php'; /* inclui a página addCliente onde tem a função PHP que insere no banco de dados */
        break;
    
    case 'listarCliente';/* Verifica se a informação que vem no parâmetro 'acao' é igual á 'listarCliente' */
        include_once './cliente/listarCliente.php';/* inclui a página listarCliente onde tem a função PHP que ajuda no refresh */
        break; 
    
    case 'ativarCliente';/* Verifica se a informação que vem no parâmetro 'acao' é igual á 'listarCliente' */
        include_once './cliente/ativarCliente.php';/* inclui a página listarCliente onde tem a função PHP que ajuda no refresh */
        break;

    case 'excCliente';
        include_once './cliente/excCliente.php';
        break;

    case 'verDadosCliente';
        include_once '.cliente/verDadosCliente.php';
        break;

/* ------------------------------------------- PRODUTO -------------------------------------------*/
    case 'listarProduto';
        include_once './produto/listarProduto.php';
        break;
    
    case 'addProduto';
        include_once './produto/addProduto.php';
        break;

    case 'excProduto';
        include_once './produto/excProduto.php';
        break;
    
    case 'ativarProduto';
        include_once './produto/ativarProduto.php';
        break;

    case 'verDadosProduto';
        include_once './produto/verDadosProduto.php';
        break;
}
