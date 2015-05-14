<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;

use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticlesController extends Controller {

    /**
     *
     */
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest()->created()->paginate(6);

        return view('articles.index', compact('articles'));
    }


    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }


    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticles($request);

        return redirect('articles');
    }


    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }


    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request)
    {
	    $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list'));

        return redirect()->route('articles.show', [$article->uri]);
    }


    /**
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags){

        $article->tags()->sync($tags);

    }


    /**
     * @param $request
     */
    private function createArticles($request)
    {
        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

        $this->syncTags($article, $request->input('tag_list'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function video()
    {
        return view('pages.video');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('pages.about');
    }
}
