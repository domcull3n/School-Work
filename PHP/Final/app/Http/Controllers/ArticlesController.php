<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller {

	public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $articles = Article::latest('created_on')->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {

        $this->createArticle($request);

        flash()->success('Your article has been successfully created!');

        return redirect('articles');
    }

    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }



    /**
     * save a new article
     *
     * @param $request
     * @return mixed
     */
    private function createArticle($request)
    {
        $article = Auth::user()->articles()->create($request->all());

        return $article;
    }

}