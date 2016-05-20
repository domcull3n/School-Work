<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about()
    {
//        $name = 'Dominic <span style="color: red;">Cullen';

//        $data = [];
//        $data['first'] = 'Dominic';
//        $data['last'] = 'Cullen';

//        $people = [];

        $people = [
            'Taylor Otwell', 'Dayle Rees', 'Eric Barnes'
        ];

        $first = 'Dominic';
        $last = 'Cullen';

        return view('pages/about', compact('people'));
    }

    public function contact()
    {
        return view('pages/contact');
    }

}
