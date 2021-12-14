<?php
require_once 'Controlador.php';
class ControleRemoto implements Controlador
{
    //atributos
    private $volume;
    private $ligado;
    private $tocando;

    //metodos
    public function __construct()
    {
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }

    public function ligar(){
        $this->setLigado(true);
    }

    public function desligar(){
        $this->setLigado(false);
    }

    public function abrirMenu(){
        echo "<br>Esta Ligado? " . (($this->getLigado())?"SIM":"NÃO"); //operador ternario 
        echo "<br>Esta Tocando? " . (($this->getLigado())?"SIM":"NÃO");
        echo "<br>Volume ". ($this->getVolume());
        for ($i=0; $i<($this->getVolume()); $i+=10) { 
            echo '  | ';
        }
    }

    public function fecharMenu(){
        echo "Fechando Menu";
    }

    public function maisVolume(){
        if ($this->getLigado()){
            $this->setVolume($this->getVolume() + 10);
        }
    
    }
    
    public function menosVolume(){
        if ($this->getLigado()){
            $this->setVolume($this->getVolume() - 10);
        }
    }

    public function ligarMudo(){
        if ($this->getLigado() && ($this->getVolume()>0)){
            $this->setVolume(0);
        }
    }

    public function desligarMudo(){
        if ($this->getLigado() && $this->getVolume()==0){
            $this->setVolume(50);
        }
    }
    public function play(){
        if ($this->getLigado() && !($this->getTocando())) {
            $this->setTocando(true);
        }
    }
    public function pause(){
        if ($this->getLigado() && $this->getTocando()) {
            $this->setTocando(false);
        }
    }


    //metodos especiais 
    public function getVolume()
    {
        return $this->volume;
    }

    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    function getLigado()
    {
        return $this->ligado;
    }

    public function setLigado($ligado)
    {
        $this->ligado = $ligado;

        return $this;
    }

    public function getTocando()
    {
        return $this->tocando;
    }

    public function setTocando($tocando)
    {
        $this->tocando = $tocando;

        return $this;
    }
}
