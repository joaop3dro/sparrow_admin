<?php

    print_r(realpath(dirname(__FILE__,2).'/src/config/database.php'));
    require_once realpath(dirname(__FILE__,2).'/src/config/database.php');

    $conexao = new Database();
    var_dump($conexao->getConection());
    Database:: getConection();

?>    