<?php 
namespace App\Interfaces;

interface TeamInterface{
    public function index();
    public function getTeams($request);
    public function allTeams();
    public function store($request);
    public function edit($id);
    public function update($request, $id);
    public function delete($id);    
}