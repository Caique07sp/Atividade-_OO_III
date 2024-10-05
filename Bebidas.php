<?php

abstract class Bebida {
    protected $nome;
    protected $preco;

    public function __construct($nome, $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public abstract function mostrarBebida(): string;

    public function verificarPreco($precoLimite): bool {
        return $this->preco < $precoLimite;
    }
}

class Vinho extends Bebida {
    private $safra;
    private $tipo;

    public function __construct($nome, $preco, $safra, $tipo) {
        parent::__construct($nome, $preco);
        $this->safra = $safra;
        $this->tipo = $tipo;
    }

    public function mostrarBebida(): string {
        return "Vinho: {$this->nome}, Safra: {$this->safra}, Tipo: {$this->tipo}, Preço: R$ {$this->preco}";
    }

    public function verificarPreco($precoLimite = 25): bool {
        return parent::verificarPreco($precoLimite);
    }
}

class Suco extends Bebida {
    private $sabor;

    public function __construct($nome, $preco, $sabor) {
        parent::__construct($nome, $preco);
        $this->sabor = $sabor;
    }

    public function mostrarBebida(): string {
        return "Suco: {$this->nome}, Sabor: {$this->sabor}, Preço: R$ {$this->preco}";
    }

    public function verificarPreco($precoLimite = 2.5): bool {
        return parent::verificarPreco($precoLimite);
    }
}

class Refrigerante extends Bebida {
    private $retornavel;

    public function __construct($nome, $preco, $retornavel) {
        parent::__construct($nome, $preco);
        $this->retornavel = $retornavel;
    }

    public function mostrarBebida(): string {
        return "Refrigerante: {$this->nome}, Retornável: " . ($this->retornavel ? 'Sim' : 'Não') . ", Preço: R$ {$this->preco}";
    }

    public function verificarPreco($precoLimite = 5): bool {
        return parent::verificarPreco($precoLimite);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_bebida = $_POST['tipo_bebida'];
    $nome = $_POST['nome'];
    $preco = (float)$_POST['preco'];

    switch ($tipo_bebida) {
        case 'vinho':
            $safra = $_POST['safra'];
            $tipo_vinho = $_POST['tipo_vinho'];
            $bebida = new Vinho($nome, $preco, $safra, $tipo_vinho);
            break;
        case 'suco':
            $sabor = $_POST['sabor'];
            $bebida = new Suco($nome, $preco, $sabor);
            break;
        case 'refrigerante':
            $retornavel = (bool)$_POST['retornavel'];
            $bebida = new Refrigerante($nome, $preco, $retornavel);
            break;
        default:
            echo "Tipo de bebida inválido!";
            exit;
    }


    echo $bebida->mostrarBebida() . "<br>";

   
    echo "O preço está abaixo do limite? " . ($bebida->verificarPreco() ? 'Sim' : 'Não') . "<br>";
}
?>