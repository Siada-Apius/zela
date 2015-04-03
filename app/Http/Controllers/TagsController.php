<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {

    /**
     *
     */
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tags = Tag::all();

		return view ('tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tags.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function store(TagRequest $request)
	{
		Tag::create($request->all());

        return redirect('tags');
	}

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\View\View
     */
	public function show(Tag $tag)
	{
		return view('tags.show', compact('tag'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Tag $tag
	 * @return \Illuminate\View\View
	 */
	public function edit(Tag $tag)
	{
        return view('tags.edit', compact('tag'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Tag $tag
     * @param TagRequest $request
     * @return Response
     */
	public function update(Tag $tag, TagRequest $request)
	{
        $tag->update($request->all());

        return redirect('tags');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Tag $tag)
	{
		$tag->delete();

        return redirect('tags');
	}

}
