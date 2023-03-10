<?php

    namespace siteDomestica\PHP\domestica;


    require_once("Conexao.php");

    use siteDomestica\PHP\domestica\Conexao;

    Class Inserir{

        public function insert(
            Conexao $conexao,
            string $cpf, 
            string $nome, 
            string $Nascimento, 
            string $rua,
            string $cidade,
            string $bairro,            
            int $numero,
            int $avaliacao,
            string $senha,
            string $email,
            string $telefone){

                try{
                    

                    $conn = $conexao->conectar();
                    $sql = "insert into domestica (cpf, nome, dataDeNascimento, rua, cidade, bairro , numero, avaliacao, senha, email, telefone, interesse1, interesse2, interesse3, interesse4) values ('$cpf','$nome','$Nascimento','$rua','$cidade','$bairro','$numero','$avaliacao','$senha','$email','$telefone')";
                    $result = mysqli_query($conn,$sql);

                    if($result){
                        echo "<br><br>Cadastrado(a) com sucesso!";
                        return;
                    }else{
                        return "<br><br>Ops, Aconteceu um erro, tente novamente! :(";
                    }//Fim if else

                    mysqli_close($conn);

                }catch(Except $erro){

                    echo $erro;

                }//Fim try catch       
        
        }//Fim da function Inserir

        

        public function inserirAnuncio(
            Conexao $conexao, 
            string $cpf,
            string $titulo, 
            string $descricao,
            string $logradouro,
            int $numero,
            string $bairro,
            string $cidade,
            float $valor,
            string $caminho)
        {
            try{
                $conn = $conexao->conectar();//Abrindo a conexão com o banco
                $sql  = "insert into anuncio (cod, cpf, titulo, descricao, rua, numero, bairro, cidade, valor, imagem) 
                values ('', '$cpf', '$titulo', '$descricao', '$logradouro', '$numero', '$bairro', '$cidade', '$valor', '$caminho')";
                $result = mysqli_query($conn,$sql);//Executa a ação do script no banco

                
                
                if($result){
                    echo "<br><br>Inserido com sucesso!";
                    return;
                }else{
                    return "<br><br>Não Inserido!";
                }
                mysqli_close($conn);//fechando a conexão com sucesso!
            }catch(Except $erro){
                echo $erro;
            }
        }//fim do cadastrar

    }//Fim do Inserir

?>