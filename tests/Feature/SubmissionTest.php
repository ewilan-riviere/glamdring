<?php

use App\Models\Submission;
use App\Notifications\ContactNotification;
use function Pest\Laravel\postJson;

it('can send email with api', function () {
    $response = postJson('/api/submissions', [
        'name' => 'Name',
        'email' => 'name@mail.com',
        'message' => 'Incididunt est labore nisi laborum enim est et voluptate aute veniam laborum consectetur occaecat. Veniam exercitation eu dolor esse laborum ut enim nostrud. Ipsum amet exercitation dolor Lorem culpa enim voluptate labore esse excepteur voluptate eu aliqua. Aliqua ea proident consectetur nostrud eu nostrud consequat eiusmod fugiat nostrud pariatur. Cupidatat adipisicing duis deserunt non aliqua id. Nostrud dolor officia velit elit excepteur qui voluptate laboris laboris. Do amet id sit est cupidatat quis non fugiat amet nisi anim est.',
        'extras' => [
            'more' => 'data',
        ],
        'app_name' => 'Glamdring',
        'send_to' => 'ewilan.riviere@gmail.com',
        'honeypot' => false,
    ]);

    $response->assertStatus(200);

    $submission = Submission::latest()->first();

    expect($submission->name)->toBe('Name');
    expect($submission->email)->toBe('name@mail.com');
    expect($submission->message)->toBeString();
    expect($submission->extras)->toBeArray();
    expect($submission->app_name)->toBe('Glamdring');
    expect($submission->send_to)->toBe('ewilan.riviere@gmail.com');
    expect($submission->honeypot)->toBeFalse();

    expect($response->json('success'))->toBeTrue();
});

it('can be shipped', function () {
    Notification::fake();

    $submission = Submission::factory()->create();

    Notification::route('mail', config('mail.to.address'))
        ->notify(new ContactNotification($submission))
    ;

    Notification::assertCount(1);
});

it('can failed if no message', function () {
    $response = postJson('/api/submissions', [
        'name' => 'Name',
    ]);

    $response->assertStatus(422);
});

it('can failed if not allowed send to', function () {
    $response = postJson('/api/submissions', [
        'name' => 'Name',
        'message' => 'Test',
        'send_to' => 'name@mail.com',
    ]);

    $response->assertStatus(202);
    expect($response->json('success'))->toBeFalse();
});
