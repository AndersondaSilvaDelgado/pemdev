<?php

require('./dao/REquipProdDAO.class.php');

$rEquipProdDAO = new REquipProdDAO();

$dados = array("dados"=>$rEquipProdDAO->dados());

$json_str = json_encode($dados);

echo $json_str;
