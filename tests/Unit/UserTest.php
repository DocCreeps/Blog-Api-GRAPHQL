<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class);

test('can create a user', function () {
    $role = Role::factory()->count(10)->create();
    $user = User::factory()->create();

    expect($user->exists())->toBeTrue();

});

test('can retrieve the user role', function () {
    $user = User::factory()->create();

    expect($user->role)->toBeInstanceOf(Role::class);
});



test('can fill the user model', function () {
  $role = Role::factory()->create();

    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('password'),
        'avatar' => 'https://example.com/avatar.jpg',
        'profession' => 'Developer',
        'biography' => 'A brief biography.',
        'role_id' => $role, // Assuming you have roles in your database
    ];

    $user = new User($data);

    expect($user->name)->toBe($data['name'])
        ->and($user->email)->toBe($data['email'])
        ->and($user->password)->toBe($data['password'])
        ->and($user->avatar)->toBe($data['avatar'])
        ->and($user->profession)->toBe($data['profession'])
        ->and($user->biography)->toBe($data['biography'])
        ->and($user->role_id)->toBe($data['role_id']);
});



test('can delete a user', function () {
    $user = User::factory()->create();

    $user->delete();

    expect(User::find($user->id))->toBeNull();
});

test('can update user', function () {
    // Crée un utilisateur
    $user = User::factory()->create();

    // Nouvelles données pour la mise à jour
    $newData = [
        'name' => 'New Name',
        'email' => 'newemail@example.com',
        'profession' => 'New Profession',
    ];

    // Met à jour l'utilisateur
    $user->update($newData);

    // Récupère l'utilisateur mis à jour depuis la base de données
    $updatedUser = User::find($user->id);

    // Assertions
    expect($updatedUser->name)->toBe($newData['name'])
        ->and($updatedUser->email)->toBe($newData['email'])
        ->and($updatedUser->profession)->toBe($newData['profession']);
});

