<?php 
namespace App\Interfaces;

interface UserInterface{
    public function index();
    public function store($request);
    public function getUsers();
    public function edit($id);
    public function update($request, $id);
    public function delete($id);
}