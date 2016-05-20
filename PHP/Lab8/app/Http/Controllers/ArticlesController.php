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
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();


        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request)
    {

        $this->createArticle($request);

        flash()->success('Your article has been successfully created!');

//        $article = new Article($request->all());
//
//        Auth::user()->articles()->save($article);
//
//        Article::create($request->all());

//        $article = new Article;
//        $article->title = $input['title'];

//        $article = new Article(['title' => ]);

        return redirect(    'articles');
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
     * @param Article $article
     * @param array $tags
     * @internal param ArticleRequest $request
     */
    public function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
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

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}