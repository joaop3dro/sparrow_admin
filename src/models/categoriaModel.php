<?php

require_once realpath(dirname(__FILE__,2).'/config/config.php');
    class CategoriaModel{
        public static function ListarTodos(){
            $conexao =  Database:: getConection();

            $sql = "SELECT * FROM categorias"; // forma menos protegido
            $resultadoQuery = $conexao->query($sql) or die ("Erro ao listar todas as categorias.").mysql_error();

                if ($resultadoQuery){
                    return $resultadoQuery;
                }else{
                    return false;
                }
        }
        public static function ListarAtivos(){
            $conexao =  Database:: getConection();

            $sql = "SELECT  id_categoria, nome FROM categorias WHERE status = 'ATIVO'"; // forma menos protegido
            $resultadoQuery = $conexao->query($sql) or die ("Erro ao listar todas as categorias.").mysql_error();

                if ($resultadoQuery){
                    return $resultadoQuery;
                }else{
                    return false;
                }
        }      


        public function incluirCategoria($dados){
            $conexao =  Database:: getConection();
            $dadosDoBanco = $dados['txtNomeCategoria'];
            $comandoSQL = $conexao->prepare("INSERT INTO categorias (nome) VALUES (?)");// para cada interroção é um campo do meu banco de dados

            //Mescla o valor da variavel la no comando SQL Prepare onde você colocou a '?'
            $comandoSQL->bind_param('s',$dadosDoBanco);// forma mais segura de fazer S= string, I= integer ...

            //Grava no banco
            $comandoSQL->execute();
            if($comandoSQL->affected_rows > 0){
              //  $id = mysqli_stmt_insert_id($comandoSQL);
              header('Location: categorias.php');
            }
        }
        public function incluirCategoriaUpdate($dados){
             $conexao =  Database:: getConection();
    
             $dadosDoBanco = $dados['txtAtualizarCategoria'];
             $comandoSQL = $conexao->prepare("UPDATE categorias SET (nome) = WHERE (?) ");
    
             $comandoSQL->bind_param('s',$dadosDoBanco);

             //Grava no banco
             $comandoSQL->execute();
             if($comandoSQL->affected_rows > 0){
                 //$id = mysqli_stmt_insert_id($comandoSQL);
                 header("Location: categorias.php"); //manipula a pagina para não duplicar o dado inserido; correção da duplicidade ao carregar a pagina
                 return $id;
             }else{
                 return "Erro ao gravar no banco de dados";
             }
         }
    }

    //Nas classes de model você cria esse IF que servirá como hub direcionando
    //um post ou get para uma determinada function
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ // aqui é onde vai deccorer a chamada se houver um *request* POST
        $categoria = new CategoriaModel;

        $acao =($_POST['acao']);

        if($acao == "insert"){
          $categoria->incluirCategoria($_POST);  
        }else{
           $categoria->incluirCategoriaUpdate($_POST);
        }
    }   
?>