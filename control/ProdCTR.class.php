<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('./model/dao/ProdDAO.class.php');
/**
 * Description of ProdCTR
 *
 * @author anderson
 */
class ProdCTR {
    //put your code here
    
    public function dados() {
        
        $prodDAO = new ProdDAO();
       
        $dados = array("dados"=>$prodDAO->dados());
        $json_str = json_encode($dados);
        
        return $json_str;
        
    }
    
}
