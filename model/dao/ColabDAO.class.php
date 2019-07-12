<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Conn.class.php';
/**
 * Description of ColaboradorDAO
 *
 * @author anderson
 */
class ColabDAO extends Conn {
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT "
                    . " F.FUNC_ID AS \"idColab\" "
                    . " , F.CD AS \"matricColab\" "
                    . " , F.NOME AS \"nomeColab\" "
                . " FROM "
                    . " USINAS.VMB_FUNC_AUTO F "
                . " ORDER BY "
                    . " F.CD "
                . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}
