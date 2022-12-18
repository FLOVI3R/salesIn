<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->where("deleted", "!=", 1);
        return view('admin.admin_dashboard', compact('users'));
    }

    public function articles()
    {
        $articles = Article::all()->where("deleted", "!=", 1);
        return view('admin.admin_articles', compact('articles'));
    }

    public function activateUser($id)
    {
        $user = User::find($id);
        $user->actived = 1;
        $user->update();
        return back();
    }

    public function deactivateUser($id)
    {
        $user = User::find($id);
        $user->actived = 0;
        $user->update();
        return back();
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        return view('admin.admin_updateUser')->with('user', $user);
    }

    public function editUser($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->update();
        return redirect('admin');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->deleted = 1;
        $user->update();
        return back();
    }

    public function createArticle() {
        return view('admin.admin_createArticle');
    }

    public function addArticle(Request $request) {
        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->image = $request->input('image');
        $article->save();
        return back();
    }

    public function updateArticle($id) {
        $article = Article::find($id);
        return view('admin.admin_updateArticle')->with('article', $article);
    }

    public function editArticle($id, Request $request) {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->image = $request->input('image');
        $article->update();
        return redirect('articles');
    }

    public function deleteArticle($id) {
        $article = Article::find($id);
        $article->deleted = 1;
        $article->update();
        return back();
    }
}
