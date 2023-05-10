<?php

namespace App\UseCases;

use App\Models\User;
use App\Models\SentMail;
use Illuminate\Support\Facades\Crypt;

class VerificateUserByRef {
    private User $user_model;
    private SentMail $sent_mail_model;

    public function __construct()
    {
        $this->user_model = new User;
        $this->sent_mail_model = new SentMail;
        return $this;
    }

    public function run($ref)
    { 
        try {
            $ref = Crypt::decrypt($ref);
            
            $data_sent = $this->sent_mail_model->select('receiver', 'id_user', 'from_admin')->where('uid', $ref)->where('expired_at', '>', date('Y-m-d H:i:s'))->first();
            if(empty($data_sent)) return false;

            if(empty($this->user_model->select('email_verified_at')->where('email', $data_sent->receiver)->where('id', $data_sent->id_user)->first()?->email_verified_at)){
                $this->user_model->where('email', $data_sent->receiver)->where('id', $data_sent->id_user)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            }
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function runWithDeleteCurrentSentMail($ref)
    {        
        try {
            $ref = Crypt::decrypt($ref);
            
            $data_sent = $this->sent_mail_model->select('receiver', 'id_user', 'from_admin')->where('uid', $ref)->where('expired_at', '>', date('Y-m-d H:i:s'))->first();
            if(empty($data_sent)) return false;

            if(empty($this->user_model->select('email_verified_at')->where('email', $data_sent->receiver)->where('id', $data_sent->id_user)->first()?->email_verified_at)){
                $this->user_model->where('email', $data_sent->receiver)->where('id', $data_sent->id_user)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            }

            $this->sent_mail_model->select('receiver', 'id_user', 'from_admin')->where('uid', $ref)->where('expired_at', '>', date('Y-m-d H:i:s'))->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}