<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmissionRequest;
use App\Models\Submission;
use App\Notifications\ContactNotification;
use Notification;

class SubmissionController extends Controller
{
    public function send(StoreSubmissionRequest $request)
    {
        $validated = $request->validated();
        $success = false;
        $select_honeypot = $validated['honeypot'];
        $valid_domain = false;

        $domain = parse_url($request->headers->get('origin'));
        if (! in_array($domain['host'], config('mail.ip.list'))) {
            $valid_domain = true;
        }

        // @phpstan-ignore-next-line
        $submission = Submission::make([
            ...$validated,
        ]);
        $submission->url = $request->headers->get('origin');
        $submission->ip = $request->ip();

        $allowed = config('mail.allowed');
        $to = array_key_exists($submission->to, $allowed)
            ? $allowed[$submission->to]
            : config('mail.allowed.default');
        $submission->to = $to;

        if (! $select_honeypot) {
            $submission->save();
            Notification::route('mail', $to)
                ->notify(new ContactNotification($submission))
            ;
            $success = true;
        }

        return response()->json([
            'message' => $success ? 'Submssion received.' : 'Submission failed.',
            'success' => [
                'honeypot' => $select_honeypot,
                'domain' => $valid_domain,
            ],
            'submission' => [
                'name' => $submission->name,
                'email' => $submission->email,
                'message' => $submission->message,
            ],
        ], $success ? 200 : 403);
    }
}
