<?php

define('HOST', '172.17.0.2');
define('USER', 'root');
define('PASS', '');
define('BASE', 'chatBot');

try{
    $conn = new pdo('mysql:host=' .HOST. ';dbname=' .BASE, USER, PASS);
}catch(PDOException $erro){
    echo 'Erro: Falha ao Conectar' .$erro->getMessage();
}

if($_POST){

    $getMsg = $_POST['value'];

    $stmt = $conn->prepare('SELECT * FROM tbl_mensagens WHERE usuario LIKE :keywords');
    $stmt->bindValue(':keywords', '%' .$getMsg. '%');
    $stmt->execute(); 
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch();
        echo $row['robo'];
    }else{

        $stmt = $conn->prepare('INSERT INTO tbl_pesquisa (termo) VALUES(:termo)');
        $stmt->bindParam(':termo', $getMsg);
        $result = $stmt->execute();

        echo 'Desculpe, não sei a resposta, vou pesquisar e te falo amanhã.';

    }

}
