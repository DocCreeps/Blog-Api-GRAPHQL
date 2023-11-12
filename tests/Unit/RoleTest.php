<?php
// tests/Unit/RoleTest.php

use App\Models\Role;
use Database\Factories\RoleFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class, WithFaker::class);

it('can create a role', function () {
    $role = Role::factory()->create();

    expect($role->name)->not->toBeNull()
        ->and($role->id)->not->toBeNull();
});

it('can update a role', function () {
    $role = Role::factory()->create();

    $newName = $this->faker->sentence(2);
    $role->update(['name' => $newName]);

    expect($role->name)->toEqual($newName);
});

it('can delete a role', function () {
    $role = Role::factory()->create();

    $role->delete();

    expect(Role::find($role->id))->toBeNull();
});

it('can retrieve all roles', function () {
    $roles = Role::factory()->count(3)->create();

    $retrievedRoles = Role::all();

    expect($retrievedRoles)->toHaveCount(3);

    foreach ($roles as $role) {
        expect($retrievedRoles->pluck('name'))->toContain($role->name);
    }
});

// Ajoutez d'autres tests au besoin
