<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Conn.class.php';

/**
 * Description of InsApontamentoMMDAO
 *
 * @author anderson
 */
class InserirApontDAO extends Conn {
    //put your code here

    /** @var PDO */
    private $Conn;

    public function salvarDados($dadosAponta) {

        $this->Conn = parent::getConn();

        foreach ($dadosAponta as $apont) {

            $select = " SELECT "
                    . " COUNT(*) AS QTDE "
                    . " FROM "
                    . " PEM_APONTAMENTO "
                    . " WHERE "
                    . " DTHR_CEL = TO_DATE('" . $apont->dthrApont . "','DD/MM/YYYY HH24:MI') "
                    . " AND "
                    . " EQUIP_ID = " . $apont->equipApont;

            $this->Read = $this->Conn->prepare($select);
            $this->Read->setFetchMode(PDO::FETCH_ASSOC);
            $this->Read->execute();
            $res1 = $this->Read->fetchAll();

            foreach ($res1 as $item1) {
                $v = $item1['QTDE'];
            }

            if ($v == 0) {

                $sql = "INSERT INTO PEM_APONTAMENTO ("
                        . " ID_ENTREGADOR "
                        . " , ID_RECEBEDOR "
                        . " , OS_NRO "
                        . " , ITEM_OS "
                        . " , ID_PRODUTO "
                        . " , QTDE_PRODUTO "
                        . " , EQUIP_ID "
                        . " , DTHR "
                        . " , DTHR_CEL "
                        . " , DTHR_TRANS "
                        . " ) "
                        . " VALUES ("
                        . " " . $apont->entregadorApont
                        . " , " . $apont->recebedorApont
                        . " , " . $apont->osApont
                        . " , " . $apont->itemOSApont
                        . " , " . $apont->idProdApont
                        . " , " . $apont->qtdeProdApont
                        . " , " . $apont->equipApont
                        . " , NULL "
                        . " , TO_DATE('" . $apont->dthrApont . "','DD/MM/YYYY HH24:MI')"
                        . " , SYSDATE "
                        . " )";

                $this->Create = $this->Conn->prepare($sql);
                $this->Create->execute();
                
            }
            
        }
    }

}
