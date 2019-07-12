<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('./model/dao/REquipProdDAO.class.php');
/**
 * Description of REquipProdCTR
 *
 * @author anderson
 */
class REquipProdCTR {
    //put your code here
    
    public function dados() {
        
        $rEquipProdDAO = new REquipProdDAO();
       
        $dados = array("dados"=>$rEquipProdDAO->dados());
        $json_str = json_encode($dados);
        
        return $json_str;
        
    }
    
}
