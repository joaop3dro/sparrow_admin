<?php

require_once realpath(dirname(__FILE__,2).'/config/config.php');

    class CategoriaModel{
        public static function ListarTodos(){
            $conexao =  Database:: getConection();

            $sql = "SELECT * FROM categorias";
            $resultadoQuery = $conexao->query($sql) or die ("Erro ao listar todas as categorias.").mysql_error();

                if ($resultadoQuery){
                    return $resultadoQuery;
                }else{
                    return false;
                }

            //var_dump($resultadoQuery);
            //var_dump($conexao);
        }
    }
?>