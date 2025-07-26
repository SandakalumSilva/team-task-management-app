<?php 
namespace App\Repositories;

use App\Interfaces\ProjectInterface;

class ProjectRepository implements ProjectInterface
{
    public function index()
    {
        return view('task.project.index');
    }
}