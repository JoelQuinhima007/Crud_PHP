<?php 

class ClienteDTO
{
    private $Id;
    private $Nome;
    private $Idade;
    private $Contacto;
    private $Endereco;

    public function __construct()
    {}
    public function getId()
    {
        return $this->Id;
    }
    public function setId($id)
    {
        $this->Id=$id;
    }
    public function getNome()
    {
        return $this->Nome;
    }
    public function setNome($nome)
    {
        $this->Nome=$nome;
    }

    public function getIdade()
    {
        return $this->Idade;
    }
    public function setIdade($idade)
    {
        $this->Idade=$idade;
    }

    public function getContacto()
    {
        return $this->Contacto;
    }
    public function setContacto($contacto)
    {
        $this->Contacto=$contacto;
    }

    public function getEndereco()
    {
        return $this->Endereco;
    }
    public function setEndereco($endereco)
    {
        $this->Endereco=$endereco;
    }

}
