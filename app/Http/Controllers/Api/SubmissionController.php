<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmissionRequest;
use App\Models\Submission;
use App\Notifications\ContactNotification;
use Notification;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('/api/submissions')]
class SubmissionController extends Controller
{
    #[Post('/', name: 'api.submissions.create')]
    public function create(StoreSubmissionRequest $request)
    {
        $validated = $request->validated();

        $appName = $validated['app_name'] ?? $request->headers->get('host');
        $sendTo = $validated['send_to'] ?? config('mail.allowed.default');
        $honeypot = $validated['honeypot'] ?? false;

        if (! in_array($sendTo, config('mail.allowed.list')) || $honeypot) {
            return $this->fakeResponse();
        }

        $submission = Submission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'extras' => $validated['extras'] ?? null,

            'app_name' => $appName,
            'send_to' => $sendTo,
            'honeypot' => $honeypot,

            'host' => $request->headers->get('host'),
            'origin' => $request->headers->get('origin'),
            'ip' => $request->ip(),
        ]);

        Notification::route('mail', config('mail.to.address'))
            ->notify(new ContactNotification($submission))
        ;

        return response()->json([
            'success' => true,
            'message' => 'Submission received.',
        ]);
    }

    public function fakeResponse()
    {
        sleep(1);

        return response()->json([
            'success' => false,
            'message' => 'Submission failed.',
        ], 202);
    }
}
