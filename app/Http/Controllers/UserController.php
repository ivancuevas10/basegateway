<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UserService;


class UserController extends Controller
{
    use ApiResponser;

     /**
     * The service to consume the user service
     * @var UserService
     */
    public $userService;


    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Return users list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->userService->obtainUsers());
    }
    
    /**
     * Create a new user
     * @return Illuminate\Http\Response
     */
    public function storage(Request $request)
    {
        return $this->successResponse($this->userService->createUser($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Return an specific user
     * @return Illuminate\Http\Response
     */
    public function show($user)
    {
        return $this->successResponse($this->userService->obtainUser($user));
    }
    

    /**
     * Update an existing user
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        return $this->successResponse($this->userService->editUser($request->all(), $user));
    }

    /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    public function destroy($user)
    {
        return $this->successResponse($this->userService->deleteUser($user));
    }


}