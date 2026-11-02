<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 投稿一覧画面を表示
    public function index()
    {
        // postsテーブルからすべての投稿のインスタンスを最新順で取得
        $posts = Post::latest()->orderBy('id', 'desc')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // 投稿作成画面を表示
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // 投稿作成画面の入力値をもとに新規投稿を作成
    public function store(Request $request)
    {
        // 作成された投稿内容を検証
        $validated = $request->validate([
            'title' => 'required|max:200',
            'content' => 'required',
        ]);

        // 検証済みの作成された投稿をデータベースに追加
        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => now(),
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // 投稿編集画面を表示
    public function edit(string $id)
    {
        // ルートパラメータのidの投稿インスタンスを取得
        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    // 投稿編集画面の入力値をもとに投稿内容を更新
    public function update(Request $request, string $id)
    {
        // 編集された投稿内容を検証
        $validated = $request->validate([
            'title' => 'required|max:200',
            'content' => 'required',
        ]);

        // ルートパラメータのidの投稿インスタンスを取得
        $post = Post::findOrFail($id);

        // 検証済みの編集された投稿をデータベース上で更新
        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            // 'published_at' => now(),
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // 投稿を削除
    public function destroy(string $id)
    {
        // ルートパラメータのidの投稿インスタンスを取得
        $post = Post::findOrFail($id);

        // 取得したインスタンスをデータベースから削除
        $post->delete();

        return redirect()->route('posts.index');
    }
}
