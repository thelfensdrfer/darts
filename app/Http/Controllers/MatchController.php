<?php

namespace App\Http\Controllers;

use App\Match;
use App\MatchUser;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $friends = collect([auth()->user()->id => auth()->user()->name])
            ->concat(auth()->user()->friends()->pluck('id', 'name'));

        return view('match.create', [
            'friends' => $friends,
            'types' => game_types(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => [
                function ($attribute, $value, $fail) {
                    if (!array_key_exists($value, game_types())) {
                        $fail(__('Game type :type does not exist', ['type' => $value]));
                    }
                }
            ],
            'sets' => 'integer|min:1|max:255',
            'legs' => 'integer|min:1|max:255',
            'friends' => 'array',
            'friends.*' => 'exists:users,id',
        ]);

        $match = Match::create([
            'user_id' => auth()->user()->id,
            'type' => $request->input('type'),
            'sets' => $request->input('sets'),
            'legs' => $request->input('legs'),
        ]);

        $i = 1;
        foreach ($request->input('friends', []) as $friendId) {
            MatchUser::create([
                'match_id' => $match->id,
                'user_id' => $friendId,
                'sort' => $i++,
            ]);
        }

        return redirect()->route('match.show', [
            'match' => $match,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Match $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        return view('match.show', [
            'match' => $match,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
