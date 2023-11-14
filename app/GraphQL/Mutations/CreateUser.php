<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CreateUser
{
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // Logique de création d'utilisateur ici
        // Utilise les valeurs de $args pour créer un nouvel utilisateur

        return User::create($args);
    }
}