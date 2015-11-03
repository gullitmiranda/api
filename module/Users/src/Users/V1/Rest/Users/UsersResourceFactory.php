<?php
namespace Users\V1\Rest\Users;

class UsersResourceFactory
{
    public function __invoke($services)
    {
        return new UsersResource();
    }
}
