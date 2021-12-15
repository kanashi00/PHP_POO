<?php
require_once 'Pessoa.php';
require_once 'Publicacao.php';
class Livro implements Publicacao{
    //atributos
    private $titulo; //string
    private $autor; //string
    private $totPaginas; //int
    private $pagAtual; //int
    private $aberto; //logico
    private $leitor; //pessoa()

    //metodos
    public function detalhes(){
        echo "<br>--------Detalhes---------";
        echo "<p>".$this->getTitulo().", um livro de ". $this->getAutor()."</p>";
        echo "<p>Vc está na página ". $this->getPagAtual(). " de ". $this->totPaginas. " páginas<p>";
        
        echo "<p>Sendo lido por: ". $this->getLeitor()->getNome();
    }

    //interface
    public function abrir(){
        $this->setAberto(true);
    }

    public function fechar(){
        $this->setAberto(false);
    }

    public function folhear($p){
        if ($p>$this->getTotPaginas()) {
            $this->setPagAtual(0);
        }
        else {
            $this->setPagAtual($p);
        }
    }

    public function avancarPag(){
        if($this->getPagAtual() < $this->getTotPaginas()){
            $this->setPagAtual($this->getPagAtual() + 1);
        }
        else if ($this->getPagAtual() == $this->getTotPaginas()){
            echo "<p>Vc chegou ao fim do livro!</p>";
        }
    }

    public function voltarPag(){
        if($this->getPagAtual() > 0){
            $this->setPagAtual($this->getPagAtual() - 1);
        }
        else if ($this->getPagAtual() == 0){
            echo "<p>Vc está no começo do livro!</p>";
        }
    }
    
    //metodos especiais
    public function __construct($titulo,$autor,$totPaginas,$leitor) {
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->totPaginas = $totPaginas;
    $this->pagAtual = 0;
    $this->aberto = false;
    $this->leitor = $leitor;
}

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    public function getTotPaginas()
    {
        return $this->totPaginas;
    }

    public function setTotPaginas($totPaginas)
    {
        $this->totPaginas = $totPaginas;

        return $this;
    }
 
    public function getPagAtual()
    {
        return $this->pagAtual;
    }

    public function setPagAtual($pagAtual)
    {
        $this->pagAtual = $pagAtual;

        return $this;
    }

    public function getAberto()
    {
        return $this->aberto;
    }

    public function setAberto($aberto)
    {
        $this->aberto = $aberto;

        return $this;
    }

    public function getLeitor()
    {
        return $this->leitor;
    }

    public function setLeitor($leitor)
    {
        $this->leitor = $leitor;

        return $this;
    }
}
