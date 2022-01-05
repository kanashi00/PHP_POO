<?php
require_once 'AcoesVideo.php';
class Video implements AcoesVideo
{
    //atributos
    private $titulo;
    private $avaliacao;
    private $views;
    private $curtida;
    private $reproduzindo;

    //metodos interface
    public function play()
    {
        $this->setReproduzindo(true);
    }

    public function pause()
    {
        $this->setReproduzindo(false);
    }
    public function like()
    {
        $this->setCurtida($this->getCurtida() + 1);
    }

    //metodos especiais
    public function __construct($titulo) {
        $this->titulo = $titulo;
        $this->avaliacao = 1;
        $this->views = 0;
        $this->curtida = 0;
        $this->reproduzindo = false;
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

    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    public function setAvaliacao($avaliacao)
    {
        $media = ($this->avaliacao + $avaliacao)/($this->views);
        $this->avaliacao = $media;

        return $this;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }
 
    public function getCurtida()
    {
        return $this->curtida;
    }

    public function setCurtida($curtida)
    {
        $this->curtida = $curtida;

        return $this;
    }

    public function getReproduzindo()
    {
        return $this->Reproduzindo;
    }

    public function setReproduzindo($reproduzindo)
    {
        $this->reproduzindo = $reproduzindo;

        return $this;
    }
}