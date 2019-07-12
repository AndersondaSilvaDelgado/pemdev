<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./dbutil/Conn.class.php');
require_once ('./model/dao/AjusteDataHoraDAO.class.php');
/*
 * Description of ApontDAO
 *
 * @author anderson
 */
class ApontDAO extends Conn {
    //put your code here

    /** @var PDO */
    private $Conn;

    public function verifApont($apont) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PEM_APONTAMENTO "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $apont->dthrApont . "','DD/MM/YYYY HH24:MI') "
                . " AND "
                . " EQUIP_ID = " . $apont->equipApont;

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $v = $item['QTDE'];
        }

        return $v;
    }

    public function insApont($apont) {

        $ajusteDataHoraDAO = new AjusteDataHoraDAO();

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
                . " , " . $ajusteDataHoraDAO->dataHoraGMT($apont->dthrApont)
                . " , TO_DATE('" . $apont->dthrApont . "','DD/MM/YYYY HH24:MI')"
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }

}
