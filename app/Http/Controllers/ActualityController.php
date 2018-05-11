<?php

namespace App\Http\Controllers;

use App\Actuality;
use App\Http\Requests\ActualityStoreRequest;
use App\Http\Utilities\SendMail;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActualityController extends Controller
{

    public function __construct()
    {
        parent::__constructor();
    }

    public static function routes($router)
    {

        $router->pattern('actuality_id', '[0-9]+');

        //admin reservation create day
        $router->post('create', [
            'uses' => 'ActualityController@store',
            'as'   => 'actuality.store',
        ]);

        $router->get('delete/{actuality_id}', [
            'uses' => 'ActualityController@delete',
            'as'   => 'actuality.delete',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ActualityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActualityStoreRequest $request)
    {
        $actuality = Actuality::create([
            'title'   => $request->title,
            'content' => nl2br($request->get('content')),
            'user_id' => $this->user->id,
            'photo'   => 0,
        ]);

        if ($request->exists('photo')) {
            $actuality->update([
                'photo' => $request->photo,
            ]);
        }


        if ($request->exists('force_mail')) {
            $force_mail = $request->force_mail == 1? true:false;
        } else {
            $force_mail = false;
        }

        if ($force_mail == true) {
            $allUserWithNewletter = User::select('users.email')
                ->where('state', '<>', 'inactive')
                ->orderBy('users.email', 'asc')
                ->get()
                ->chunk(45)
                ->toArray();
        } else {
            $allUserWithNewletter = User::select('users.email')
                ->where('newsletter', true)
                ->where('state', '<>', 'inactive')
                ->orderBy('users.email', 'asc')
                ->get()
                ->chunk(45)
                ->toArray();
        }
        $allUserWithNewletter2 = [];

        foreach ($allUserWithNewletter as $index => $users) {
            foreach ($users as $user) {
                $allUserWithNewletter2[$index][] = $user['email'];
            }
        }

        $writter = User::findOrFail($actuality->user_id);

        $data['title'] = $actuality->title;
        $data['content'] = $actuality->content;
        $data['writter'] = $writter->forname . ' ' . $writter->name;

        foreach($allUserWithNewletter2 as $users) {
            SendMail::send($users, 'newActuality', $data, 'Nouvelle actualité AS Lectra Badminton');
        }

        return redirect()->back()->with('success', 'L\'actualité est bien postée !');
    }

    public function delete($actuality_id)
    {
        $actuality = Actuality::findOrFail($actuality_id);
        $actuality->delete();

        return redirect()->back()->with('success', "L'actualité vient d'être supprimée !");
    }
}
