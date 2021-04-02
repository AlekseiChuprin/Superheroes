<?php

namespace App\Http\Controllers;

use App\models\Superhero;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @var Superhero
     */
    private $superhero;

    /**
     * IndexController constructor.
     * @param Superhero $hero
     */

    public function __construct(Superhero $hero)
    {
        $this->superhero = $hero;
    }

    /**
     * Display a listing of the superheros.
     * @return view
     */
    public function index() : View
    {
        $superheroes = $this->superhero->orderBy('id', 'desc')->paginate(3);

        return view('heroes', compact('superheroes'));
    }

    /**
     * Displaying one hero
     * @return view
     */
    public function showHero($nickname) : View
    {
        $hero = $this->superhero->where('nickname', $nickname)->firstOrFail();

        return view('show-hero', compact('hero'));
    }
}
