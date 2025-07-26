<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        return $this->projectRepository->index();
    }
}
