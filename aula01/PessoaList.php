<?php
require_once 'classes/Pessoa.php';

class PessoaList {
    private $html;
    public function __construct() {
        $this->html = file_get_contents('template/list.html');

    }
    public function delete($param) {
      
        try {
            
            $id = (int) $param['id'];
            Pessoa::delete($id);
        }
        catch (Exception $e) {
    
            print $e->getMessage();
        }
    }
    public function load() {
        try {
            $pessoas = Pessoa::all();
            $items = '';
            foreach ($pessoas as $pessoa) {
                $item = file_get_contents('template/item.html');
                $item = str_replace('{id}', $pessoa['id'], $item);
                $item = str_replace('{nome}', $pessoa['nome'], $item);
                $item = str_replace('{endereco}', $pessoa['endereco'], $item);
                $item = str_replace('{bairro}', $pessoa['bairro'], $item);
                $item = str_replace('{tel}', $pessoa['tel'], $item);
                $item = str_replace('{email}', $pessoa['email'], $item);
                $items.= $item;
            }
            $this->html = str_replace('{items}', $items, $this->html);
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function show() {
        $this->load();
        print $this->html;
    }
}

?>