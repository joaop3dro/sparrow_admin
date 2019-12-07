<?php
require_once realpath(dirname(__FILE__, 2) . '/config/config.php');

    class LoginModel{
        public static function logar($dados){
            $email = $dados['inputEmail'];
            $senha = $dados['inputSenha'];

            $conexao =  Database:: getConection();

            $sql = "SELECT email,primeiro_nome,segundo_nome
                    FROM usuarios 
                    WHERE email = '$email' AND senha = '$senha'"; // forma menos protegido       
            $resultadoQuery = $conexao->query($sql) or die ("Erro ao Logar.").mysql_error();

            if ($resultadoQuery){
                  return $resultadoQuery;
            }else{
                return false;
            }
        }
    }

?>