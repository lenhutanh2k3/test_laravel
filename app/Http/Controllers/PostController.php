<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function index()
    {
        //lay tat ca
        $posts = DB::table('posts')->get();

        //lay phan tu id =1 , cot title
        //$posts =DB::table('posts')->where('id','=',1)->value('title');

        //lay gia tri tu 1 cot duy nhat
        //$posts = DB::table('posts')->pluck('title');

        //sap xep 
        //$posts =DB::table('posts')->orderBy('id','desc')->get();

        // gioi han
        //$posts =DB::table('posts')->limit(2)->get();

        // chon cot cu the
        //$posts= DB::table('posts')->select('id','title')->get();

        //    // insert
        //    $insert = DB::table('posts')->insert(
        //     [
        //         'title'=>'nhut anh',
        //         'body'=>'Dai hoc cong nghe sai gon',
        //     ]
        //     );
        //     $posts =[];
        //     if ($insert >0)
        //     {
        //         $posts = DB::table('posts')->get();
        //     }
        //     else
        //     {
        //         $posts='khong co ';
        //     }
        //dd($posts);
        return view('home', compact('posts'));
    }
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        // Lấy dữ liệu từ request
        $title = $request->input('title');
        $body = $request->input('body');
        $created_at = $request->input('created_at');
        $updated_at = $request->input('updated_at');

        // Chèn dữ liệu vào bảng 'posts'
        $kt = DB::table('posts')->insert([
            'title' => $title,
            'body' => $body,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]);

        // Kiểm tra kết quả và trả về thông báo
        if ($kt) {
            return redirect()->route('post.index')->with('success', 'Post created successfully!');
        } else {
            return redirect()->route('posts.create')->with('error', 'Failed to create post.');
        }
    }
    public function edit(string $id)
    {
        $post =DB::table('posts')->find($id);
        //dd($post);
        return view('form_edit')->with('post',$post);
    }
    public function update(Request $request, string $id)
    {
        $title = $request->input('title');
        $body =$request->input('body');
        $updated_at =$request->input('updated_at');

        $update = DB::table('posts')->where('id',$id)->update(
            [
                'title'=>$title,
                'body'=>$body,
                'updated_at'=>now(),
            ]
            );
            if ($update) {
                return redirect()->route('post.index')->with('success', 'Post updated successfully!');
            } else {
                return back()->with('error', 'Failed to update post.');
            }
    }
    public function destroy(string $id)
    {
        // Thực hiện xóa bài viết theo id
        $kt = DB::table('posts')->where('id', $id)->delete();

        // Kiểm tra kết quả xóa và trả về thông báo
        if ($kt) {
            // Xóa thành công
            return redirect()->route('post.index')->with('success', 'Xoa thanh cong');
        } else {
            // Xóa thất bại
            return redirect()->route('post.index')->with('error', 'xoa that bai');
        }
    }


}
