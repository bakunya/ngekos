<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;
use App\Models\SentMail;
use Ramsey\Uuid\Rfc4122\UuidV5;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use App\Mail\SendMail as MailSendMail;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

trait SendMail {
    public function sendMail(
        string $to,
        string $subject,
        string $view,
        array $view_data,
        bool $from_admin,
        $expired = null,
        $user_id = null,
    ) {
        $model_sent_mail = new SentMail;

        $mail_expired = isset($expired) ? $expired : now()->addHours(3);
        $user_id = isset($user_id) ? $user_id : User::where('email', $to)->first()->id;
        $uid = UuidV5::uuid5(UuidV5::NAMESPACE_URL, Uuid::uuid4()->toString())->toString();

        // insert to sent mail
        $model_sent_mail->fill([
            'uid' => $uid,
            'from_admin' => $from_admin,
            'id_user' => $user_id,
            'expired_at' => $mail_expired,
            'receiver' => $to,
        ]);
        $model_sent_mail->save();

        Mail::send(new MailSendMail(
            new Envelope(subject: $subject, to: $to),
            new Content(
                view: $view, 
                with: array_merge($view_data, [ 
                    'uid' => Crypt::encrypt($uid),
                    'from_admin' => $from_admin, 
                    'expired_at' => $mail_expired,
                ]), 
            )
        ));
    }
}