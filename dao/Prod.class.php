<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Conn.class.php';
/**
 * Description of Prod
 *
 * @author anderson
 */
class Prod extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;
    
    public function dados() {

        $select = " SELECT " 
                . " PROD_ID AS \"idProd\" "
                . " , CD AS \"codProd\" "
                . " , DESCR AS \"descrProd\" "
                . " FROM "
                . " USINAS.VMB_PROD_MANUT"
                . " ORDER BY PROD_ID ASC ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}
