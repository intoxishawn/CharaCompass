<?php

class ControladorGeral{

      
    public function index()
    {
        include 'HTML/index.html';
    }

    public function login(){
        include 'HTML/login.php';

    }

    public function cadastro(){
        include 'HTML/cadastro.php';
    }
}