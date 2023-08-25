<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class UserService {
    use ConsumesExternalServices;

     /**
     * The base uri to be used to consume the users service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to be used to consume the users service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users.base_uri');
        //$this->secret = config('services.users.secret');
    }

    /**
     * Get the full list of users from the users service
     * @return string
     */
    public function obtainUsers(){
        return $this->performRequest('GET', '/users');
    }

    /**
     * Create an instance of user using the users service
     * @return string
     */
    public function createUser($data){
        return $this->performRequest('POST', '/users', $data);
    }

    /**
     * Get a single user from the users service
     * @return string
     */
    public function obtainUser($user){
        return $this->performRequest('GET', "/users/{$user}");
    }

    /**
     * Update a single user from the users service
     * @return string
     */
    public function editUser($data, $user){
        return $this->performRequest('PUT', "/users/{$user}", $data);
    }

    /**
     * Remove a single user from the users service
     * @return string
     */
    public function deleteUser($user){
        return $this->performRequest('DELETE', "/users/{$user}");
    }

}