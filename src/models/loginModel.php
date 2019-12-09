<?php
require_once realpath(dirname(__FILE__,2).'/config/config.php');
class LoginModel{
    public static function logar($email, $senha){
        session_start();
        $conexao = Database::getConection();
        $sql = "SELECT email, primeiro_nome, segundo_nome 
                FROM usuarios 
                WHERE email = '$email' AND senha ='$senha'";
        
        $resultado = $conexao->query($sql) or die ("Erro ao efetuar login").mysql_error();
        
        if($resultado->num_rows == 1){
            $usuario = mysqli_fetch_assoc($resultado);            
            $_SESSION['primeiro_nome'] = $usuario['primeiro_nome'];
            $_SESSION['segundo_nome'] =  $usuario['segundo_nome'];
            $_SESSION['logado'] = "sim";
            //$msg = array('logado' => true, 'mensagem' => 'Logado com sucesso!');
            //echo json_encode($msg, JSON_PRETTY_PRINT);
            //exit();
            header('Location: index.php');
        } else{
            $msg = array('logado' => false, 'mensagem' => 'Dados não encontrados!');
            echo json_encode($msg, JSON_PRETTY_PRINT);
            exit();
        }
    }
    public static function logout(){     
       session_start();
       session_destroy();
       header('Location: login.php');
    }
    
    public static function verificaSeLogado(){
        if($_SESSION['logado'] != "sim"){
            header('Location: login.php');
        }
    }

    public static function verficarOrigemRequisicao(){
        // Verifica se a origem da requisição é do mesmo domínio da aplicação
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "http://localhost/sparrow_admin/login.php"):
            $retorno = array('codigo' => 666, 'mensagem' => 'Sai demoinnn');
            echo json_encode($retorno);
            exit();
        endif;
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    LoginModel::verficarOrigemRequisicao();
    //verifica se uma acao definida
    $acao = (isset($_POST['acao'])? $_POST['acao'] : "");
    $email = (isset($_POST['inputEmail'])? $_POST['inputEmail'] : "");
    $senha = (isset($_POST['inputSenha'])? $_POST['inputSenha'] : "");
    switch ($acao) {
        case 'logar':
            // Dica 2 - Validações de preenchimento e-mail e senha se foi preenchido o e-mail
            if (empty($email)){
                $retorno = array('mensagem' => 'Preencha seu e-mail!');
                echo json_encode($retorno);
                exit();
            } 
                         
            if (empty($senha)){
                $retorno = array('mensagem' => 'Preencha sua senha!');
                echo json_encode($retorno);
                exit();
            };
            // Dica 3 - Verifica se o formato do e-mail é válido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $retorno = array('mensagem' => 'Formato de e-mail inválido!');
                echo json_encode($retorno);
                exit();
            }
            LoginModel::logar($email, $senha);
            break;
        
        default:
            # code...
        break;
 }
}