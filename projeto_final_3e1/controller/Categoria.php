<?php
    require "model/CategoriaModel.php";
    class Categoria{
        function __construct(){
            session_start();
            if(!isset($_SESSION['usuario'])){
                header('Location: ?c=restrito&m=login');
            }
            $this->model = new CategoriaModel();
        }

        function index(){
            $categorias = $this->model->buscarTodos();
            include "view/template/cabecalho.php";
            include "view/template/menu.php";
            include "view/categoria/listagem.php";
            include "view/template/rodape.php";
        }

        function add(){
            include "view/template/cabecalho.php";
            include "view/template/menu.php";
            include "view/categoria/form.php";
            include "view/template/rodape.php";
        }

        function editar($id){
            $categoria = $this->model->buscarPorid($id);
            include "view/template/cabecalho.php";
            include "view/template/menu.php";
            include "view/categoria/form.php";
            include "view/template/rodape.php";
        }

        function excluir($id){
            $this->model->excluir($id);
            header("Location: ?c=categoria");
        }

        function salvar(){
            if(isset($_POST['categoria']) && !empty($_POST['categoria'])){
                if(empty($_POST['idcategoria'])){
                    $this->model->inserir($_POST['categoria']);
                }else{
                    $this->model->atualizar($_POST['idcategoria'], $_POST['categoria']);
                }
                header("Location: ?c=categoria");
            }else{
                echo "Ocorreu um erro, pois os dados não foram enviados";
            }
        }
    }