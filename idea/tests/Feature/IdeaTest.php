<?php

use App\Models\Idea;

test('it belongs to a user', function () {
    $idea = Idea::factory()->create();

    expect($idea->user)->toBeInstanceOf(\App\Models\User::class);
});

test('it can have steps', function () {
    $idea = Idea::factory()->create();

    expect($idea->steps)->toBeEmpty();

    $idea->steps()->create(['description' => 'Do the thing']);

    expect($idea->fresh()->steps)->toHaveCount(1);
});
