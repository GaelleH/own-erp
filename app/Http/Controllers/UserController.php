<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Carbon\Carbon;

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
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
