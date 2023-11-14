<?php
// tests/Unit/RoleTest.php

use App\Models\Role;
use App\Models\User;
use Database\Factories\RoleFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

uses(TestCase::class, WithFaker::class, RefreshDatabase::class);

test('can create a role', function () {
    $role = Role::factory()->create();

    expect($role->name)->not->toBeNull()
        ->and($role->id)->not->toBeNull();
});

test('can update a role', function () {
    $role = Role::factory()->create();

    $newName = $this->faker->sentence(2);
    $role->update(['name' => $newName]);

    expect($role->name)->toEqual($newName);
});

test('can delete a role', function () {
    $role = Role::factory()->create();

    $role->delete();

    expect(Role::find($role->id))->toBeNull();
});

test('can retrieve all roles', function () {
    $roles = Role::factory()->count(3)->create();

    $retrievedRoles = Role::all();

    expect($retrievedRoles)->toHaveCount(3);

    foreach ($roles as $role) {
        expect($retrievedRoles->pluck('name'))->toContain($role->name);
    }
});

test('can retrieve user with role', function () {
    // Crée un rôle
    $role = Role::factory()->create();

    // Crée un utilisateur avec le rôle associé
    $user = User::factory()->create(['role_id' => $role->id]);

    // Récupère l'utilisateur avec le rôle
    $retrievedUser = User::with('role')->find($user->id);

    // Assertions
    expect($retrievedUser->role)->toBeInstanceOf(Role::class)
        ->and($retrievedUser->role->name)->toEqual($role->name);
});

// Ajoutez d'autres tests au besoin
