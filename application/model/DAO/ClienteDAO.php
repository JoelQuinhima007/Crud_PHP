<?php


class ClienteDAO
{

    public function Create(ClienteDTO $cliente)
    {
        try{
            /// Instrução sql, faz referência ao procedimento inserir dados, na base de dados 
            $Sql="INSERT INTO cliente (nome,idade,contacto,endereco)values(:nome,:idade,:contacto,:endereco)";
            //Fazer a conexão com a base de dados
            $Sql_procedure=DBConnection::getConnection()->prepare($Sql);
            ///Preencher o campo nome na base de dados
            $Sql_procedure->bindValue(":nome",$cliente->getNome());
                ///Preencher o campo idade na base de dados
            $Sql_procedure->bindValue(":idade",$cliente->getIdade());
                ///Preencher o campo contacto na base de dados
            $Sql_procedure->bindValue(":contacto",$cliente->getContacto());
                ///Preencher o campo endereço na base de dados
            $Sql_procedure->bindValue(":endereco",$cliente->getEndereco());
            //essa linha permite efectivar a instrução sql e depois o resultado é devolvido através do comando return
            return $Sql_procedure->execute();

           }catch(Exception  $ex)
           {

             print "Erro ao cadastrar os dados <br>".$ex.'<br>';

           }



    }
    public function Update(ClienteDTO $cliente)
    {
        
        try{

           /// Instrução sql, faz referência ao procedimento actualizar dados, na base de dados 
            $Sql="UPDATE cliente SET nome=:nome, idade=:idade,contacto=:contacto, endereco=:endereco 
            where id=:id";
               //Fazer a conexão com a base de dados
            $Sql_procedure=DBConnection::getConnection()->prepare($Sql);
              ///Apanhar o campo id na base de dados para permitir actualizar as restantes colunas na base de dados
            $Sql_procedure->bindValue(":id",$cliente->getId());
             ///Actualizar o campo nome na base de dados
            $Sql_procedure->bindValue(":nome",$cliente->getNome());
             ///Actualizar o campo idade na base de dados
            $Sql_procedure->bindValue(":idade",$cliente->getIdade());
             ///Actualizar o campo contacto na base de dados
            $Sql_procedure->bindValue(":contacto",$cliente->getContacto());
             ///Actualizar o campo endereço na base de dados
            $Sql_procedure->bindValue(":endereco",$cliente->getEndereco());
             //essa linha permite efectivar a instrução sql e depois o resultado é devolvido através do comando return
            return $Sql_procedure->execute();

           }catch(Exception  $ex)
           {

             print "Erro ao actualizar os dados <br>".$ex.'<br>';

           }


    }
    public function Delete(ClienteDTO $cliente)
    {
      try{

         /// Instrução sql, faz referência ao procedimento eliminar dados, na base de dados 
        $Sql="DELETE FROM cliente WHERE id=:id";
         //Fazer a conexão com a base de dados
        $Sql_procedure=DBConnection::getConnection()->prepare($Sql);
        // permite verificar se o id que vem do formulário é igual ao que está na BD, se for o dado é eliminado
        $Sql_procedure->bindValue(":id",$cliente->getId());
         //essa linha permite efectivar a instrução sql e depois o resultado é devolvido através do comando return
        return $Sql_procedure->execute();

       }catch(Exception  $ex)
       {

         print "Erro ao eliminar os dados <br>".$ex.'<br>';

       }
    

      
    }
    public function Read()
    {
      try{
         /// Instrução sql, faz referência ao procedimento consultar dados, na base de dados 
          $Sql="SELECT id,nome,idade,contacto,endereco FROM cliente";
          //Fazer a conexão com a base de dados
          $Sql_procedure=DBConnection::getConnection()->query($Sql);
          // Permite consultar toda informação na base de dados  
          $lista=$Sql_procedure->fetchAll(PDO::FETCH_ASSOC);
          //Criamos um array para receber toda informação vinda da base de dados
          $lista_array=array();
          // Criamos a estrutura de repetição para permitir a leitura de todos os registos na base de dados
          //A variavel $lista passa todos os dados para a variavel $row 
          foreach($lista as $row)
          {
            //A variavel $row preenche a função listar 
            //A variavel $lista_array vai receber toda informação vinda da função Listar 
            $lista_array[]=$this->Listar($row);
          }
         //Devolve os dados vindos da BD
         return $lista_array;
        

       }catch(Exception  $ex)
       {

         print "Erro ao ler os dados <br>".$ex.'<br>';

       }
      
    }
    private function Listar($linha)
    {
      //Instanciar o objecto cliente
      $cliente= new ClienteDTO();
      //o objecto cliente a função setId para apanhar os dados que veem  da base de dados
      $cliente->setId($linha['id']);
      //o objecto cliente a função setNome para apanhar os dados que veem  da base de dados
      $cliente->setNome($linha['nome']);
      //o objecto cliente a função setIdade para apanhar os dados que veem  da base de dados
      $cliente->setIdade($linha['idade']);
      //o objecto cliente a função setContacto para apanhar os dados que veem  da base de dados
      $cliente->setContacto($linha['contacto']);
    //o objecto cliente a função setEndereco para apanhar os dados que veem  da base de dados
      $cliente->setEndereco($linha['endereco']);
      // Depois do objecto estar preenchido , devolve os dados a função listar
      return $cliente;
    }

}