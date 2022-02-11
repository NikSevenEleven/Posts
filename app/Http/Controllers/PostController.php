<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        return view('post.index',compact('posts'));
    }


    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('post.create',compact('categories','tags'));
    }

    public function store()
    {
        $data=request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags=$data['tags'];
        unset($data['tags']);


        $post=Post::create($data);
        $post->tags()->attach($tags);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id'=>$tag,
//                'post_id'=>$post->id,
//            ]);
//        }

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('post.edit',compact('post','categories','tags'));
    }
    public function update(Post $post)
    {
        $data=request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags=$data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show',$post->id);
    }

    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('post.index');
    }




//    public function update()
//    {
//        $postsArr =
//            [[
//                'title' => 'test 2',
//                'content' => 'test 2',
//                'image' => 'test 2',
//                'likes' => '35',
//                'is_published' => '1',
//            ]
//            ];
//        foreach ($postsArr as $item) {
//            Post::find('2')->update($item);
//        }
//    }
//
//    public function delete()
//    {
//
//        $post = Post::withTrashed()->find('1');
//        $post->restore();
//        dd('finish');
//
//    }
//
//    public function firstOrCreate()
//    {
//        $post = Post::find(1);
//        $anotherPost =
//            [
//                'title' => 'some post',
//                'content' => 'some test',
//                'image' => 'some test',
//                'likes' => '50',
//                'is_published' => '1',
//            ];
//        $post = Post::firstOrCreate([
//            'title' => 'test some  content',
//        ], [
//            'title' => 'test some  content',
//            'content' => 'some test',
//            'image' => 'some test',
//            'likes' => '50',
//            'is_published' => '1',
//        ]);
//        dump($post->content);
//        dd('finished');
//    }
//
//    public function updateOrCreate()
//    {
//        $anotherPost =
//            [
//                'title' => ' updateOrCreate',
//                'content' => 'update or create some test',
//                'image' => 'some test',
//                'likes' => '1',
//                'is_published' => '1',
//            ];
//        $post=Post::updateOrCreate(
//            [
//                    'title'=>' test content not phpstorm',
//            ],
//            [
//            'title' => 'test content not phpstorm',
//            'content' => '123',
//            'image' => '123',
//            'likes' => '1',
//            'is_published' => '1',
//        ]);
//        dump($post->content);
//        dd('2222');
//    }
}



