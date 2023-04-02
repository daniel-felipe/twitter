<?php

use App\Models\User;
use App\Models\Tweet;
use App\Http\Livewire\Tweet\Create;
use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function Pest\Laravel\assertDatabaseCount;

it('should be able to create a tweet', function () {
    $user = User::factory()->create();

    \Pest\Laravel\actingAs($user);

    livewire(Create::class)
        ->set('body', 'This is my first tweet')
        ->call('tweet')
        ->assertEmitted('tweet::created');

    assertDatabaseCount('tweets', 1);

    expect(Tweet::first())
        ->body->toBe('This is my first tweet')
        
        ->created_by->toBe($user->id);
});

todo('should make sure that only authenticated user users can tweet');
todo('body is required');
todo('the tweet body should have a max length of 140 characters');
todo('sould show the tweet on the timeline');
