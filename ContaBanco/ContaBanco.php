<?php
    class ContaBanco{
        //atributos
        public $numConta;
        protected $tipo;
        private $dono;
        private $saldo;
        private $status;
        
        //metodos
        public function abrirConta($t){
            $this->setTipo($t); //maneira 1
            $this->setStatus(true); //maneira 1
            if ($t == "CC") {
                $this->saldo = 50; //outra mandeira, mas a maneira 1 eh a manis indicada
            }
            elseif ($t == "CP") {
                $this->setSaldo(150);
            }
        }

        public function fecharConta(){
            if ($this->getSaldo() > 0) {
                echo"<p>Conta de ".$this->getDono()." ainda tem um saldo de R$ ".$this->getSaldo().", não posso fechá-la!</p>";
            }
            elseif ($this->getSaldo() <0 ) {
                echo "<p>Conta de ".$this->getDono()." com débito de R$ ".$this->getSaldo()." Impossível encerrar!</p>";
            }
            else {
                $this->setStatus(false);
                echo "<p>Conta de ".$this->getDono()." fechada com sucesso</p>";
            }
        }

        public function depositar($v)
        {
            if ($this->getStatus()) { // tb posso escrever: if ($this->satus == true){}, eu defini lá no abrir conta isso como verdadeiro.
                $this->setSaldo($this->getSaldo() + $v); // ou: $this->saldo = $this->saldo + $v;
                echo "<p>Deposito de R$ $v na conta de ".$this->getDono()."</p>";
            }
            else {
                echo "<p>Impossivel depositar</p>";
            }
        }

        public function sacar($v)
        {
            if ($this->getStatus()) {
                if ($this->getSaldo() >= $v ) {
                    $this->setSaldo($this->getSaldo() - $v); //$this->setSaldo = $this->saldo - $v;
                    echo "<p>Saque de R$ $v autorizado na conta de ".$this->getDono()."</p>";
                }
                else {
                    echo "<p>Saldo insuficiente</p>";
                }
            }
            else { //tentando sacar de uma conta com status false
                echo "Impossivel Sacar";
            }
        }

        public function pagarMensal()
        {
            if ($this->getTipo() == "CC") {
                $v = 12;
            }
            elseif ($this->getTipo() == "CP") {
                $v = 20;
            }
            if ($this->getStatus()) {
                $this->setSaldo($this->getSaldo() - $v);
                echo "Mensalidade de $v debitada na conta de ".$this->getDono()."</p>";
            }
            else {
                echo "<p>Problemas com a conta. Não posso cobrar.</p>";
            }
        }

        //metodos especiais
        public function __construct()
        {
            $this->setSaldo(0);
            $this->setStatus(false);
            echo "<p>Conta criada com sucesso</p>";
        }
        
        public function setNumConta($n){
            $this->numConta = $n;
        }

        public function getNumConta(){
            return $this->numConta;
        }

        public function setTipo($t){
            $this->tipo = $t;
        }
        
        public function getTipo(){
            return $this->tipo;
        }

        public function setDono($d){
            $this->dono = $d;
        }

        public function getDono(){
            return $this->dono;
        }

            public function setSaldo($s){
            $this->saldo = $s;
        }   

        public function getSaldo() {
            return $this->saldo;
         }

        public function setStatus($s){
            $this->status = $s;
        }

        public function getStatus(){
            return $this->status;
        }

    }

?>