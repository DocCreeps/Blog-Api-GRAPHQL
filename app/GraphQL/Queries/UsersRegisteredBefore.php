<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UsersRegisteredBefore
{
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $date = $args['date'];

        // Utilisez Carbon pour formater et comparer les dates
        $formattedDate = Carbon::parse($date)->format('Y-m-d');

        // Récupération des utilisateurs inscrits avant la date spécifiée
        return User::where('created_at', '<', $formattedDate)->get();
    }
}
