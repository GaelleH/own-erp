<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')
            ->paginate(10);

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $allUsers = DB::table('users')->get();
            $users = DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();

            if($users) {
                foreach ($users as $key => $user) {
                    $date = Carbon::parse($user->created_at);
                    $output.='<tr>'.
                    '<td>' . $user->name .'</td>'.
                    '<td><a href="mailto:' . $user->email . '">' . $user->email .'</a></td>'.
                    '<td>'. $date->format('d/m/Y H:i') .'</td>'.
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="users/'. $user->id .'">Show</a>
                                <a class="dropdown-item" href="users/edit/'. $user->id .'">Edit</a>
                            </div>
                        </div>
                    </td>' .
                    '</tr>';
                }
            } else {
                foreach ($allUsers as $user) {
                    $date = Carbon::parse($user->created_at);
                    $output .= '<tr>' .
                    '<td>' . $user->name . '</td>' .
                    '<td><a href="mailto:' . $user->email . '">' . $user->email . '</a></td>' .
                    '<td>' . $date->format('d/m/Y H:i') . '</td>' .
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="users/'. $user->id .'">Show</a>
                                <a class="dropdown-item" href="users/edit/'. $user->id .'">Edit</a>
                            </div>
                        </div>
                    </td>' .
                    '</tr>';
                }
            }

            return Response($output);
        }
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('users.index')->withStatus(__('De user werd succesvol aangemaakt.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
