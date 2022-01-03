<?php
require_once 'Lutador.php';
class Luta{
    private $desafiante;
    private $desafiado;
    private $round;
    private $aprovado;

    //metodos
    public function marcarLuta($l1,$l2)
    {
        if (($l1->getCategoria() === $l2->getCategoria()) && ($l1!=$l2)) {
            $this->aprovado = true;
            $this->desafiado = $l1;
            $this->desafiante = $l2;
        }
        else {
            $this->aprovado = false;
            $this->desafiado = null;
            $this->desafiante = null;
        }
    }

    public function lutar()
    {
        if ($this->aprovado) {
            $this->desafiante->apresentar();
            $this->desafiado->apresentar();
            $vencedor = rand(0,2);
            switch ($vencedor) {
                case 0:
                    echo "<p>Empatou!</p>";
                    $this->desafiado->empatarLuta();
                    $this->desafiante->empatarLuta();
                    break;
                
                case 1://desafiado vence
                    echo "<p>O vencedor é: ".($this->desafiado->getNome())."</p>";
                    $this->desafiado->ganharLuta();
                    $this->desafiante->perderLuta();
                    break;

                case 2:
                    echo "<p>O vencedor é: ".($this->desafiante->getNome())."</p>";
                    $this->desafiado->perderLuta();
                    $this->desafiante->ganharLuta();
                    break;
            }
        }

        else {
            echo "Luta não pode acontecer";
        }
    }
    
    //metodos especiais 
    public function getDesafiante()
    {
        return $this->desafiante;
    }

    public function setDesafiante($de)
    {
        $this->desafiante = $de;
    }

    public function getDesafiado()
    {
        return $this->desafiado;
    }

    public function setDesafiado($dd)
    {
        $this->desafiado = $dd;
    }

    public function getRound()
    {
        return $this->round;
    }

    public function setRound($r)
    {
        $this->round = $r;
    }

    public function getAprovado()
    {
        return $this->aprovado;
    }

    public function setAprovado($a)
    {
        $this->aprovado = $a;
    }

}