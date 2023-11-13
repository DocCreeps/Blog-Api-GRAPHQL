<?php

namespace App\GraphQL\Mutations;

use App\Models\Role;

class UpdateRole
{
    public function __invoke($rootValue, array $args)
    {
        // Recherche du rôle par l'ID
        $role = Role::find($args['id']);

        if (!$role) {
            return null; // Le rôle n'existe pas
        }

        // Met à jour le nom du rôle
        $role->update([
            'name' => $args['name'],
        ]);

        return $role;
    }
}
