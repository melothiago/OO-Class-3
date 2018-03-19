<?php
class ContaBanco {
    
    // Atributos
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    // Metodos especiais
    public function __construct($conta, $d) {
        $this->setNumConta($conta);
        $this->setDono($d);
        $this->setSaldo(0.00);
        $this->setStatus(FALSE);
        
        echo "Conta $conta criada com sucesso para $d!</br></br>";
    }
    
    function getNumConta() {
        return $this->numConta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDono() {
        return $this->dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getStatus() {
        return $this->status;
    }

    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    
    // Metodos
    public function abrirConta($tipo) {
        
        $this->setTipo($tipo);
        $this->setStatus(TRUE);
        
        if ($tipo == "CC"){
            $this->setSaldo(50.00);
            
        }elseif($tipo == "CP"){
            $this->setSaldo(150.00);
        }

    }
    
    public function fecharConta() {
        
        if($this->getSaldo() > 0){
            echo 'Conta com dinheiro';
        }elseif($this->getSaldo () < 0){
            echo 'Conta em debito';
        }else{
            $this->setStatus(FALSE);
        }
        
    }
    
    public function depositar($param) {
        
        if($this->getStatus() == TRUE){
            $this->setSaldo($this->getSaldo() + $param);
        }else{
            echo 'Conta nao esta aberta';
        }
        
    }
    
    public function sacar($param) {
        
        if($this->getStatus() == TRUE){
            
            if($this->getSaldo() >= $param){
                
                $this->setSaldo($this->getSaldo() - $param);
                echo "Saque de $param autorizado na conta $this->numConta pertencente a $this->dono!</br>";
                
            }else{
                echo 'Saldo insuficiente';
            }            
                        
        } else {
            echo 'Conta inativa';
        }
                
    }
    
    public function pagarMensal() {
        
        if($this->getStatus() == TRUE){
            
            if($this->getTipo() == "CC"){
                
                $valor = 12.00;
            
            }elseif($this->getTipo() == "CP"){
            
                $valor = 20.00;
                
            }
            
            if($this->getSaldo() >= $valor){
                
                $this->setSaldo($this->getSaldo() - $valor);
                
                echo "Foi debitado a mensalidade de $valor na conta de $this->dono! </br>";
                
            } else {
            
                echo 'Saldo insuficiente';
                
            }
                        
        }else{
            echo 'Imposivel pagar';
        }
       
                
    }
    
}
