<?php 
include_once "./config/constantes.php";
include_once "./config/conexao.php";
include_once "./func/dashboard.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$conn = conectar();

if(!empty($dados) && isset($dados)) {
    
    $idCliente = $dados['id'];
    
    $returnExc = deleteRegistro('cliente','idCliente', "$idCliente");
    echo json_encode($returnExc);
} else {
    echo json_encode('Falha na exclusão');
}
