<?php
/**
 * Created by PhpStorm.
 * User: Hidran Arias
 * Date: 29/01/2017
 * Time: 23:36
 */

namespace LaraCourse\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index( Request $req)
   {
       
       return 'Hello World '.$req->input('name','');
   }
}