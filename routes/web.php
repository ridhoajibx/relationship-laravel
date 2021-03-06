<?php

use App\User;
use App\Post;
use App\Tag;

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('{user}/posts', function(User $user){
    $posts = $user->posts;
    return view('users.show', [
            'user' => $user, 
            'posts' => $posts,
        ]);
});

Route::get('posts/{post}', function(Post $post){
    return view('posts.show', compact('post'));
});

Route::get('tags/{tag}/posts', function(Tag $tag){
    return $tag->posts;
});
