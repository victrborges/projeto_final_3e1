<?php
    require_once "config/Conexao.php";
    class UsuarioModel{
        function __construct(){
            $this->conexao = Conexao::getConnection();
        }

        function inserir($login, $senha){
            $sql = "INSERT INTO usuario (login, senha) value (?,?)";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("ss", $login, $senha);
            $comando->execute();
        }

        function excluir($id){
            $sql = "DELETE FROM usuario WHERE idusario = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("i", $id);
            $comando->execute();
        }

        function atualizar($id, $login, $senha){
            $sql = "UPDATE usuario SET login = ?, senha = ? WHERE idusario = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("ssi", $login, $senha, $id);
            $comando->execute();
        }

        function buscarPorId($id){
            $sql = "SELECT * FROM usuario WHERE idusario = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("i", $id);
            if ($comando->execute()){
                $resultado = $comando->get_result();
                return $resultado->fetch_assoc();
            }
            return null;
        }

        function buscarPorLogin($login){
            $sql = "SELECT * FROM usuario WHERE login = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("s", $login);
            if ($comando->execute()){
                $resultado = $comando->get_result();
                return $resultado->fetch_assoc();
            }
            return null;
        }

        function buscarTodos(){
            $sql = "SELECT * FROM usuario";
            $comando = $this->conexao->prepare($sql);
            if ($comando->execute()){
                $resultados = $comando->get_result();
                return $resultados->fetch_all(MYSQLI_ASSOC);
            }
            return null;
        }
    }