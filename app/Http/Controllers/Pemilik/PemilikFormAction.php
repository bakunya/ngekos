<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemilik\PemilikStore;
use App\Http\Requests\Pemilik\PemilikUpdate;
use App\Jobs\SendMailJob;
use App\Models\Pemilik;
use App\Models\User;
use App\Traits\SendMail;

class PemilikFormAction extends Controller
{
    use SendMail;
    
    public function create(PemilikStore $req)
    {
        $model_user = new User;
        $model_pemilik = new Pemilik;

        // create transaction to insert in both model
        $model_user->getConnection()->transaction(function () use ($req, $model_user, $model_pemilik)
        {
            // insert to user
            $model_user->fill([
                'fullname' => $req->fullname,
                'email' => $req->email,
                'password' => bcrypt($req->password),
            ]);
            $model_user->save();

            // insert to pemilik
            $model_pemilik->fill([
                'telp' => $req->telp,
                'nik' => $req->nik,
                'alamat' => $req->alamat,
                'id_user' => $model_user->id,
            ]);
            $model_pemilik->save();
        });

        SendMailJob::dispatchAfterResponse(
            to: $req->email,
            subject: 'Verifikasi Email',
            view: 'mail.verify-mail',
            view_data: [
                'name' => $req->fullname,
                'email' => $req->email,
                'password' => $req->password,
            ],
            expired: now()->addHours(3),
            user_id: $model_user->id,
            from_admin: true,
        );

        return redirect()->route('GET.admin.pemilik.create')->with('success', 'Berhasil membuat admin baru');
    }

    public function update(PemilikUpdate $req, int $id)
    {
        $model_user = new User;
        $model_pemilik = new Pemilik;

        // create transaction to insert in both model
        $model_user->getConnection()->transaction(function () use ($req, $id, $model_user, $model_pemilik)
        {
            $curr = $model_pemilik->select('id_user')->first($id);
            
            // update to user
            $model_user->where('id', $curr->id_user)->update([
                'fullname' => $req->fullname,
                'email' => $req->email,
            ]);

            // update to pemilik
            $model_pemilik->where('id', $id)->update([
                'telp' => $req->telp,
                'nik' => $req->nik,
                'alamat' => $req->alamat,
            ]);
        });

        return redirect()->route('GET.admin.pemilik.index')->with('success', 'Berhasil mengubah data pemilik');
    }
    
    public function delete(int $id)
    {   
        $model_user = new User;
        $model_pemilik = new Pemilik;

        // create transaction to insert in both model
        $model_user->getConnection()->transaction(function () use ($model_user, $model_pemilik, $id)
        {
            $curr = $model_pemilik->select('id_user')->find($id);
            $model_user->find($curr->id_user)->delete();
        });

        return back()->with('success', 'Berhasil menghapus admin');
    }
}
