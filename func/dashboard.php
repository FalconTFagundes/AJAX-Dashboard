<?php

// by: Luciano Pettersen
// by: Rafael Fagundes 

/* Function Update  */
function upUm($tabela, $campo1, $campoId, $valeu1, $valeuId)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqUpdate = $conn->prepare("UPDATE $tabela SET $campo1 = ? WHERE $campoId = ? ");
        $sqUpdate->bindValue(1, $valeu1, PDO::PARAM_STR);
        $sqUpdate->bindValue(2, $valeuId, PDO::PARAM_INT);
        $sqUpdate->execute();
        $conn->commit();
        if ($sqUpdate->rowCount() > 0) {
            return 'Atualizado';
        } else {
            return 'nAtualizado';
        };
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}


/* Function Select */
function listarGeral($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->query("SELECT $campos "
            . "FROM $tabela ");
        $sqlLista->execute();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

/* Function Delete */
function deleteRegistro($tabela, $campoReferencia, $idparametro)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();

        $sqUpdate = $conn->prepare("DELETE FROM $tabela WHERE $campoReferencia = ?");
        $sqUpdate->bindValue(1, $idparametro, PDO::PARAM_INT);
        $sqUpdate->execute();
        $conn->commit();
        if ($sqUpdate->rowCount() > 0) {
            return 'Deletado';
        } else {
            return 'nDeletado';
        };
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

/* Function Select Condicional Assoc */
function listarRegistroUAssoc($tabela, $campos, $idcampo, $idparametro)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos "
            . "FROM $tabela "
            . "WHERE $idcampo = ? ");
        $sqlLista->bindValue(1, $idparametro, PDO::PARAM_STR);
        $sqlLista->execute();
        if ($sqlLista->rowCount() > 0) {
//            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
            return $sqlLista->fetch(PDO::FETCH_ASSOC);
        } else {
            return 'Vazio';
        };
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

/* Function Insert Dois Valores */
function insertDois($tabela, $campos, $valeu1, $valeu2)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqInsert = $conn->prepare("INSERT INTO $tabela($campos)VALUES(?,?)");
        $sqInsert->bindValue(1, $valeu1, PDO::PARAM_STR);
        $sqInsert->bindValue(2, $valeu2, PDO::PARAM_STR);
        $sqInsert->execute();
        $conn->commit();
        if ($sqInsert->rowCount() > 0) {
            return 'Gravado';
        } else {
            return 'nGravado';
        };
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
