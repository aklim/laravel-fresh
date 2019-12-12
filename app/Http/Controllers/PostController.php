<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Events\PostUpdated;
use App\Models\Eloquent\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required'],
        ]);
    }

    /**
     * The post has ben created.
     *
     * @param Request $request
     * @param mixed   $post
     *
     * @return mixed
     */
    protected function created(Request $request, $post)
    {

    }

    /**
     * The post has ben updated.
     *
     * @param Request $request
     * @param mixed   $post
     *
     * @return mixed
     */
    protected function updated(Request $request, $post)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = $request->all();

        event(new PostCreated($post = Post::create([
            'title'   => $data['title'],
            'content' => $data['content'],
        ])));

        return $this->created($request, $post) ?: redirect('/posts/' . $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return View
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     *
     * @return mixed
     */
    public function edit(Post $post)
    {
        return view('posts.update', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post    $post
     *
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validator($request->all())->validate();
        $data = $request->all();

        $post->update([
            'title'   => $data['title'],
            'content' => $data['content'],
        ]);

        event(new PostUpdated($post));

        return $this->updated($request, $post) ?: redirect('/posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return void
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts');
    }
}
