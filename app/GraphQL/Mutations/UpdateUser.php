<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UpdateUser
{
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // Logique de mise à jour d'utilisateur ici
        // Utilise les valeurs de $args pour mettre à jour l'utilisateur

        $user = User::findOrFail($args['id']);
        $user->update($args);

        return $user;
    }
}
