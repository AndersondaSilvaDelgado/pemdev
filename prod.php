<?php

require('./control/ProdCTR.class.php');

$prodCTR = new ProdCTR();

echo $prodCTR->dados();
