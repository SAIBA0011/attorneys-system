<?php
/**
 * Created by PhpStorm.
 * User: Tiaan-Pc
 * Date: 3/14/2016
 * Time: 8:28 AM
 */
namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    public function findUser( $slug );
}