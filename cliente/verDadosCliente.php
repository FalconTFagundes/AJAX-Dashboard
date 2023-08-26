<?php 


include_once "./config/constantes.php";
include_once "./config/conexao.php";
include_once "./func/dashboard.php";

$retornoListarCliente = listarGeral('idcliente, nome, telefone, ativo','cliente');

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$conn = conectar();
if(!empty($dados) && isset($dados)) {
    
    $idCliente = $dados['id'];
    $retorno = listarRegistroUAssoc('cliente', 'idcliente, nome, telefone, ativo', 'idcliente', "$idCliente");
    $retornoListarCliente = ['status'=>'True', 'dados'=>$retorno];
} else {
    $retornoListarCliente = ['status'=>'Vazio', 'dados'=>'Vazio'];
}

echo json_encode($retornoListarCliente);

?>

