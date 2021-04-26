<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function cpf_primeiro_digito($cpf, $soma_digitos = 0, $posicoes = 10)
    {
        $cpf = substr($cpf, 0, 9);

        for ($i = 0; $i < 9; $i++)
        {
            $soma_digitos = $soma_digitos + ($cpf[$i] * $posicoes);
            $posicoes--;
        }

        if ($soma_digitos % 11 < 2)
        {
            $soma_digitos = 0;
            $cpf = $cpf.$soma_digitos;
            return  $cpf;
        };

        if ($soma_digitos % 11 >= 2)
        {
            $soma_digitos = 11 - ($soma_digitos % 11);
            $cpf = $cpf.$soma_digitos;
            return  $cpf;
        };
        return $cpf;
    }

    function cpf_segundo_digito($cpf, $soma_digitos = 0, $posicoes = 11) {
        $novo_cpf = cpf_primeiro_digito($cpf);

        for ($i = 0; $i < 10; $i++)
        {
            $soma_digitos = $soma_digitos + ($novo_cpf[$i] * $posicoes);
            $posicoes--;
        }

        if($soma_digitos % 11 < 2)
        {
            $soma_digitos = 0;
            $novo_cpf = $novo_cpf . $soma_digitos;
            return$novo_cpf;
        }

        if($soma_digitos % 11 >= 2)
        {
            $soma_digitos = 11 - ($soma_digitos % 11);
            $novo_cpf = $novo_cpf . $soma_digitos;
            return $novo_cpf;
        }
    }

    if(isset($_POST['cpf']))
    {
        if($_POST['cpf'] != cpf_segundo_digito($_POST['cpf']))
        {
            echo "CPF INVALIDO";
            return;
        }
        echo "CPF valido";
    }
    ?>
</body>

</html>