<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Interfaces\RoleInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepository;
    public function __construct(RoleInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return $this->roleRepository->index();
    }

    public function getRoles(Request $request){
        return $this->roleRepository->getRoles($request);
    }

    public function store(RoleRequest $request)
    {
        return $this->roleRepository->store($request);
    }

    public function edit($id)
    {
        return $this->roleRepository->edit($id);
    }

    public function update(RoleRequest $request, $id)
    {
        return $this->roleRepository->update($request, $id);
    }   

    public function delete($id)
    {
        return $this->roleRepository->delete($id);
    }   
}
