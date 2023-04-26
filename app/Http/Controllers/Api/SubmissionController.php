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

        $submission = Submission::create([
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'message' => $validated['message'] ?? null,
            'extras' => $validated['extras'] ?? null,

            'app_name' => $appName,
            'send_to' => $sendTo,
            'honeypot' => $honeypot,

            'host' => $request->headers->get('host'),
            'origin' => $request->headers->get('origin'),
            'ip' => $request->ip(),
        ]);

        if (! in_array($sendTo, config('mail.allowed.list')) || $honeypot) {
            $submission->failed = true;

            return $this->fakeResponse($sendTo, $honeypot);
        }

        Notification::route('mail', [
            // config('mail.to.address') => config('mail.to.name'),
            'ewilan@mail.com' => 'Ewilan',
        ])->notify(new ContactNotification($submission));

        return response()->json([
            'success' => true,
            'message' => 'Submission received.',
        ]);
    }

    public function fakeResponse(string $sendTo, bool $honeypot)
    {
        sleep(1);

        return response()->json([
            'success' => false,
            'message' => 'Submission failed.',
            'reasons' => [
                'send_to' => $sendTo,
                'honeypot' => $honeypot,
            ],
        ], 202);
    }
}
