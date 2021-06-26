<?php

namespace App\Http\Controllers;

//追記
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //追記
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();

        $articles = $user->articles->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
    //追記
    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $articles = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    //追加
    public function followings(string $name)
    {
        //loadを追加（N+1）
        $user = User::where('name', $name)->first()->load('followers.followers');

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }
    
    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }
        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $user];
        //ここまで追記
    }
    //追記
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }
        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
    //ここまで追記
}
