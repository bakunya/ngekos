<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Penyewa\PenyewaStore;
use App\Http\Requests\Penyewa\PenyewaUpdate;
use App\Models\Penyewa;
use App\Models\User;
use App\Traits\SendMail;

class PenyewaFormAction extends Controller
{
    use SendMail;

    public function create(PenyewaStore $req)
    {
        $model_user = new User;
        $model_penyewa = new Penyewa;

        // create transaction to insert in both model
        $model_user->getConnection()->transaction(function () use ($req, $model_user, $model_penyewa)
        {
            // insert to user
            $model_user->fill([
                'fullname' => $req->fullname,
                'email' => $req->email,
                'password' => bcrypt($req->password),
            ]);
            $model_user->save();

            // insert to penyewa
            $model_penyewa->fill([
                'telp' => $req->telp,
                'nik' => $req->nik,
                'alamat' => $req->alamat,
                'id_user' => $model_user->id,
            ]);
            $model_penyewa->save();
        });

        $this->sendMail(
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

        return redirect()->route('GET.admin.penyewa.create')->with('success', 'Berhasil membuat penyewa baru');
    }

    public function update(PenyewaUpdate $req, int $id)
    {
        $model_user = new User;
        $model_penyewa = new Penyewa;

        // create transaction to insert in both model
        $model_user->getConnection()->transaction(function () use ($req, $id, $model_user, $model_penyewa)
        {
            $curr = $model_penyewa->select('id_user')->first($id);
            
            // update to user
            $model_user->where('id', $curr->id_user)->update([
                'fullname' => $req->fullname,
                'email' => $req->email,
            ]);

            // update to penyewa
            $model_penyewa->where('id', $id)->update([
                'telp' => $req->telp,
            ]);
        });

        return redirect()->route('GET.admin.penyewa.index')->with('success', 'Berhasil mengubah data penyewa');
    }

    public function delete(int $id)
    {   
        $model_user = new User;
        $model_penyewa = new Penyewa;

        // create transaction to insert in both model
        $model_user->getConnection()->transaction(function () use ($model_user, $model_penyewa, $id)
        {
            $curr = $model_penyewa->select('id_user')->first($id);
            $model_user->find($curr->id_user)->delete();
        });

        return back()->with('success', 'Berhasil menghapus penyewa');
    }
}
