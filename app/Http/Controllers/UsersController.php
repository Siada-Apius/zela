<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Auth\Guard;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth', ['only' => ['edit']]);

    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if($this->auth->check() && $this->auth->user()->role == 'admin')
        {
            $users = User::all();

            return view ('users.index', compact('users'));
        }

        abort(404);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return two objects
     * @internal param Comment $params
     */
	public function show(User $user)
	{
        $params = Comment::whereUserId($user->id)->get();

		return view('users.show', compact('user', 'params'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  User $user
	 * @return Response
	 */
	public function edit(User $user)
	{
        if($this->auth->check()
            && $this->auth->user()->email == $user->email
            || $this->auth->user()->role == 'admin')
        {
            return view('users.edit', compact('user'));
        }

        abort(404);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param UserRequest $request
     * @return redirect
     */
	public function update(User $user, UserRequest $request)
    {
        $user->update($request->all());

        return redirect()->route('users.show', [$user->name]);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
