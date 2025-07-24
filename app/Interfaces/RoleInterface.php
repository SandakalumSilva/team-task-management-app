<?php 
namespace App\Interfaces;

interface RoleInterface{
    public function index();
    public function getRoles($request);
    public function store($request);
    public function edit($id);
    public function update($request, $id);
    public function delete($id);
}