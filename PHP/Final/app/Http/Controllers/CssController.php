<?php namespace App\Http\Controllers;

use App\Css;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CssRequest;
use Illuminate\Http\Request;
use Auth;

class CssController extends Controller {

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
        $templates = Css::latest('created_on')->get();

		return view('templates.index', compact('templates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CssRequest $request)
	{
        $this->createCss($request);

        flash()->success('Your template has been successfully created!');

        return redirect('templates');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $template = Css::findOrFail($id); //THIS IS WHAT I SHOULD USE FOR ALL SHOW METHODS!

        return view('templates.show', compact('template'));
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

    private function createCss($request)
    {
        $template = Auth::user()->templates()->create($request->all());

        return $template;
    }
}
