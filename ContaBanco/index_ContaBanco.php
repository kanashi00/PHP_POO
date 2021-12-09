<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index exemplo pratico metodos especiais</title>
</head>
<body>
    <pre>
    <?php
        require_once 'ContaBanco.php';
        $p1 = new ContaBanco; //jubileu
        $p2 = new ContaBanco; //creuza

        $p1->abrirConta("CC");
        $p1->setDono("jubileu Ramos");
        $p1->setNumConta(1111);

        $p2->abrirConta("CP");
        $p2->setDono("Creuza da Silva");
        $p2->setNumConta(2222);

        $p1->depositar(300);
        $p2->depositar(500);

        $p2->sacar(100);
        $p2->sacar(1000);

        $p1->pagarMensal();
        $p2->pagarMensal();

        $p1->fecharConta();
        $p2->fecharConta();

        //sacar tudo
        $p1->sacar(338);
        $p2->sacar(530);

        //fechar
        $p1->fecharConta();
        $p2->fecharConta();

        print_r($p1);
        print_r($p2);
    ?>
    </pre>
</body>
</html>