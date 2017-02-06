<?php

namespace LaraCourse\Http\Controllers;

use Illuminate\Http\Request;

use View;

class PageController extends Controller
{
    protected $data = [
        [
            'name' => 'Hidran',
            'lastname' => 'SArias'

        ],
        [
            'name' => 'James',
            'lastname' => 'Blond'

        ],
        [
            'name' => 'Harry',
            'lastname' => 'Plotter'

        ]
    ];

    public function about()
    {
        // $view = app('view');
        //return $view('about');
        return view('about');
        // return   View::make('about');
    }

    public function blog()
    {
        // $view = app('view');
        //return $view('about');
        return view('blog');
        // return   View::make('about');
    }

    public function staff()
    {

   /*     return view('staff',
            [ 
                'title' => 'Our staff',
                'staff' => $this->data
            ]
        );
   
        return view('staff')
            ->with('staff' , $this->data)
            ->with('title','Our Staff');
   */
        //return view('staff')->withStaff($this->data)->withTitle('Our staff');
        
        $staff = $this->data;
        $title = 'OUR STAFF';
        return view('staff', compact('title','staff'));
    }
}
