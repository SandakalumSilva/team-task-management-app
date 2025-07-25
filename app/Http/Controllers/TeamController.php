<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Interfaces\TeamInterface;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $teamRepository;
    public function __construct(TeamInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function index()
    {
        return $this->teamRepository->index();
    }

    public function getTeams(Request $request){
        return $this->teamRepository->getTeams($request);
    }

    public function allTeams(){
        return $this->teamRepository->allTeams();
    }

    public function store(TeamRequest $request)
    {
        return $this->teamRepository->store($request);
    }   

    public function edit($id){
        return $this->teamRepository->edit($id);
    }

    public function update(TeamRequest $request, $id){
        return $this->teamRepository->update($request, $id);
    }

    public function delete($id){
        return $this->teamRepository->delete($id);
    }
}
