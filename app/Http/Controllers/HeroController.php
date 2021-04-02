<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroRequest;
use App\models\Superhero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * @var Superhero
     */
    private $superhero;

    /**
     * HeroController constructor.
     * @param Superhero $hero
     */
    public function __construct(Superhero $hero)
    {
        $this->superhero = $hero;
    }

    /**
     * Store a new hero  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroRequest $request) : RedirectResponse
    {
        $data = $request->all();
        $data['image'] = $this->superhero->uploadImage($request);
        $this->superhero->create($data);

        return redirect()->route('index')->with('Succes', 'Hero added');
    }

    /**
     * Update hero in storage.
     * @param  HeroRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(HeroRequest $request, Superhero $hero) : RedirectResponse
    {
        $data = $request->all();
        if($file = $hero->uploadImage($request, $hero->image)){
            $data['image'] = $file;
        }
        $hero->update($data);

        return redirect()->route('index')->with('success', 'Hero updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Superhero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $hero) : RedirectResponse
    {
        Storage::delete($hero->image);
        $hero->delete();

        return redirect()->route('index')->with('success', 'Hero deleted');
    }
}
