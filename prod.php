<?php

require('./dao/ProdDAO.class.php');

$prodDAO = new ProdDAO();

$dados = array("dados"=>$prodDAO->dados());

$json_str = json_encode($dados);

echo $json_str;
