<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UsersByRole
{
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $roleName = $args['roleName'];

        // Recherche du rôle par le nom
        $role = \App\Models\Role::where('name', $roleName)->first();

        if (!$role) {
            return null; // ou une réponse vide selon vos besoins
        }

        // Récupération des utilisateurs liés à ce rôle
        return User::where('role_id', $role->id)->get();
    }
}
