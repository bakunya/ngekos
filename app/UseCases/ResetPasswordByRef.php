<?php

namespace App\UseCases;

use App\Models\User;
use App\Models\SentMail;
use Illuminate\Support\Facades\Crypt;

class ResetPasswordByRef {
    private User $user_model;
    private SentMail $sent_mail_model;

    public function __construct()
    {
        $this->user_model = new User;
        $this->sent_mail_model = new SentMail;
        return $this;
    }

    public function runWithDeleteCurrentSentMail($ref, $pass)
    {        
        try {
            $ref = Crypt::decrypt($ref);
            
            $data_sent = $this->sent_mail_model->select('receiver', 'id_user', 'from_admin')->where('uid', $ref)->where('expired_at', '>', date('Y-m-d H:i:s'))->first();
            if(empty($data_sent)) return false;
            
            $this->user_model->where('email', $data_sent->receiver)->where('id', $data_sent->id_user)->update(['password' => bcrypt($pass)]);
            $this->sent_mail_model->select('receiver', 'id_user', 'from_admin')->where('uid', $ref)->where('expired_at', '>', date('Y-m-d H:i:s'))->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}