<?php

namespace App\GraphQL\Mutations;

use App\Models\Role;

class CreateRole
{
    public function __invoke($rootValue, array $args)
    {
        // Créez un nouveau rôle en utilisant le modèle Eloquent
        return Role::create([
            'name' => $args['name'],
        ]);
    }
}
