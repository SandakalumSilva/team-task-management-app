<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->index();
    }

    public function store(UserRequest $request)
    {
        return $this->userRepository->store($request);
    }

    public function getUsers()
    {
        return $this->userRepository->getUsers();
    }

    public function edit($id)
    {
        return $this->userRepository->edit($id);
    }

    public function update(UserRequest $request, $id)
    {
        return $this->userRepository->update($request, $id);
    }   

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
