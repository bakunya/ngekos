<?php

namespace App\Http\Controllers\Kos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kos\KosStore;
use App\Models\ImageUrl;
use App\Models\Post;

class KosFormAction extends Controller
{
    public function create(KosStore $req)
    {
        $imagesName = [];

        if ($req->hasFile('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = uniqid().'-'.$image->getClientOriginalName();
                $image->storeAs('uploads', $imageName);
                array_push($imagesName, $imageName);
            }
        }

        $model_post = new Post;
        $model_image = new ImageUrl;

        $model_post->getConnection()->transaction(function () use ($req, $imagesName, $model_post, $model_image)
        {
            $model_post->fill([
                'konten' => base64_encode($req->post)
            ]);
            $model_post->save();

            $id_post = $model_post->id;
            foreach ($imagesName as $value) {
                $model_image->create([
                    'url' => $value,
                    'id_post' => $id_post
                ]);
            }
        });

        return redirect()->route('GET.admin.kos.create')->with('success', 'Berhasil membuat data kos');
    }
}
