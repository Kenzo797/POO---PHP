<?php

require_once 'classes/pessoa.php';

class PessoaForm {
    private $html;
    private $data;

    public function __construct() {
    
        $this->html = file_get_contents('template/form.html');
        $this->data = ['id' => null,
        'nome' => null,
        'endereco' => null,
        'bairro' => null,
        'tel' => null,
        'email' => null];

    }

    public function save($param) {
        try {
    
            $this->data = Pessoa::save($param);
            print "Registro salvo";
    
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
}
    public function edit($param) {

        try {
            $id = (int) $param['id'];
            $pessoa = Pessoa::find($id);
            $this->data = $pessoa;
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
       
    }
    public function show() {
        
        $this->html = str_replace('{id}', $this->data['id'], $this->html);
        $this->html = str_replace('{nome}', $this->data['nome'], $this->html);
        $this->html = str_replace('{endereco}', $this->data['endereco'], $this->html);
        $this->html = str_replace('{bairro}', $this->data['bairro'], $this->html);
        $this->html = str_replace('{tel}', $this->data['tel'], $this->html);
        $this->html = str_replace('{email}', $this->data['email'], $this->html);
        print $this->html;
    }
}


?>