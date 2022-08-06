<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmissionRequest;
use App\Models\Submission;
use App\Notifications\ContactNotification;
use Notification;

class SubmissionController extends Controller
{
    public function create(StoreSubmissionRequest $request)
    {
        $validated = $request->validated();
        $success = false;

        /**
         * Optional arguments
         */
        $app = $validated['app'] ?? $request->headers->get('host');
        $to = $validated['to'] ?? config('mail.allowed.default');
        $select_honeypot = $validated['honeypot'] ?? false;

        if (in_array($to, config('mail.allowed.list')) && ! $select_honeypot) {
            $success = true;
        }

        if (! $success) {
            return $this->fakeResponse();
        }

        $submission = Submission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],

            'app' => $app,
            'to' => $to,
            'honeypot' => $select_honeypot,

            'host' => $request->headers->get('host'),
            'origin' => $request->headers->get('origin'),
            'ip' => $request->ip(),
        ]);

        Notification::route('mail', config('mail.to.address'))
            ->notify(new ContactNotification($submission))
        ;

        return response()->json([
            'success' => true,
            'message' => config('app.env') === 'local'
                ? $submission
                : 'Submission received.',
        ]);
    }

    public function fakeResponse()
    {
        return response()->json([
            'success' => false,
            'message' => 'Submission failed.',
        ], 202);
    }
}
