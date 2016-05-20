<?php namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use Auth;

class ContentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $contents = Content::latest('created_on')->get();

        return view('content.index', compact('contents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('content.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ContentRequest $request)
	{
        $this->createContent($request);

        flash()->success('Your content area has been successfully created!');

        return redirect('content');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $content = Content::findOrFail($id); //THIS IS WHAT I SHOULD USE FOR ALL SHOW METHODS!

        return view('content.show', compact('content'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

    private function createContent($request)
    {
        $content = Auth::user()->contents()->create($request->all());

        return $content;
    }

}
