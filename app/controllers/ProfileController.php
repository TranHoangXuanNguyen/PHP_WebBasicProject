<?php

require_once('./app/core/Controller.php');
class ProfileController extends Controller
{
    public function index()
    {
        $data = ['default'];
        $this->view('Profile', $data);
    }

    public function edit($thamsotruyenvao)
    {
        echo '$id = ' . $thamsotruyenvao . ';';
    }
}
