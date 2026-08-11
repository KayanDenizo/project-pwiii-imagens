<?php
class Produto_class
{
    private $pdo;
    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
        } catch (PDOException $e) {
            echo 'Erro com banco de dados: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Erro generico: ' . $e->getMessage();
        }
    }

    public function enviarProduto($nome, $descricao, $fotos = array()) {}


    public function buscarProdutos() {    }
    
    public function buscarProdutosPorId($id) {
        
    }

}
