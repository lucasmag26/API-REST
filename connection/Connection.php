<?php
    class connection extends Mysqli{
        function __construct()
        {
            parent::__construct('localhost:3309','root','','api_rest');
            $this->set_charset('utf-8');
            $this->connect_error == NULL ? 'Conexão com exito ao BD' : die('Erro ao conectar com BD');
        }//end_construct
    }//end Class Connection