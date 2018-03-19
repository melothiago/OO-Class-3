<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
            <?php
            
                require_once 'ContaBanco.php';
        
                $p1 = new ContaBanco(1111, "Jubileu");
                $p2 = new ContaBanco(2222, "Creuza");
                
                $p1->abrirConta("CC");
                $p1->depositar(300.00);
                $p1->pagarMensal();
                $p1->sacar(338.00);
                $p1->fecharConta();
                print_r($p1);
                
                $p2->abrirConta("CP");
                $p2->depositar(500.00);
                $p2->sacar(100.00);
                $p2->pagarMensal();
                $p2->sacar(530.00);
                $p2->fecharConta();
                print_r($p2);
                
                
            ?>
        </pre>
    </body>
</html>
