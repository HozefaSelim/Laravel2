<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function getAllusers(){
      
        // ORM
       // $user = User::all();

        // Query Builer
       // $user = DB::table('users')->get();

      //  $user = DB::table('users')->where('id' ,'35')->first();

    //     $user = DB::table('users')->pluck('email');


    //    $users = DB::table('users')->distinct()->count('name');
       
    //    $query = DB::table('users')->select('name' );
    //   $users = $query->addSelect('email')->get();
       

    //   $users = DB::table('users')
    //                 ->where('id', '>', 30)
    //                 ->orWhere('name', 'DB')
    //                 ->get();


    //   $users = DB::table('users')->orderBy('id', 'desc')->get();

      $users  = DB::table('users')
      ->selectRaw('id * ? as price_with_tax', [2])
      ->get();


 
    
        return response()->json([
            'user' => $users 
        ]);
    }


    public function createUser(Request $request){

       $user =  DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt( $request->password),
        ]);

        return response()->json([
            'user' => $user
        ]);
    }

    public function DeleteUser($id){

        $user =  DB::table('users')->where('id' , $id)->delete();
 
         return response()->json([
             'user' => $user
         ]);
     }

    public function getAllPostsWithUsers(){

        // Query Builder
        $posts = DB::table('posts')
                    ->join('users' , 'posts.user_id', '=','users.id')
                    ->select('posts.title','users.name as author_name')
                    ->get();



         // ORM - Elquent
        //   $posts = Post::with('user')
        //                 ->get()
        //                  ->map( function ($post){
        //                     return [
        //                         "title" => $post->title,
        //                         "author_name" => $post->user->name,
        //                     ];
        //                  }) ;

                    return response()->json([
                        'posts' => $posts
                    ]);

     }


     
     public function test(){

     // $data = User::all("name" , "email");
    //  $data = DB::table('users')
    //             ->select('id','name')
    //             ->get();

    //  $data = DB::table('users')
    //             ->select('name','email')
    //             ->where('name' , '=' , 'DB')
    //             ->get();

    //  $data = DB::table('users')
    //             ->select('id','name','email')
    //             ->where([
    //                 ['name' , 'DB'],
    //                 ['id', '196'] ]
    //                 )        ->get();

    // DB::raw , selectRaw
    //  $data = DB::table('users')
    //             ->select(['name', DB::raw('count(*) as numbers')])
    //             ->groupBy('name' )
    //             ->orderBy('numbers' , 'desc')
    //             ->get();


    //  $data = DB::table('users')
    //             ->selectRaw('id , name , LENGTH(name) as name_length')
    //             ->get();

    //  $data = DB::table('users')
    //              ->select(['id','name' , DB::raw('LENGTH(name) as name_length')] )
    //              ->orderBy(DB::raw('LENGTH(name)' ), 'desc')
    //             ->get();


    $postIDs =[170,171];
    //  $dataA = DB::table('posts')
    //             ->whereIn('id' , $postIDs)
    //              ->select('id' , 'title' )
    //             ->get();

    //  $dataB = DB::table('posts')
    //             ->whereNotIn('id' , $postIDs)
    //              ->select('id' , 'title' )
    //             ->get();

     
    //  $data =   $dataA->merge( $dataB );

    
     $dataA = DB::table('posts')
                ->whereNotIn('id' , $postIDs)
                 ->select('id' , 'title' );
                

     $data = DB::table('posts')
                ->whereIn('id' , $postIDs)
                 ->select('id' , 'title' )
                 ->union(    $dataA )
                ->get();

     
     
     

                return $data;
     }

     public function test2(){
        // return the posts with the author (user) and comments number

        // $data = Db::table('posts')
        //             ->join('users','posts.user_id' ,'=' ,'users.id')
        //             ->leftjoin('comments' ,'posts.id' , '=' ,'comments.post_id')
        //             ->select('posts.id' , 'posts.title', 'users.name as author_name',
        //                    DB::raw('count(comments.id) as comments_count') )
        //             ->groupBy('posts.id' ,'posts.title', 'users.name')
        //             ->orderByDesc('comments_count') 
        //             ->get();


        // return the posts that have keyword
        // $keyWord = 'aut';
        //     $data = DB::table('posts')
        //             ->where('title', 'like',"%$keyWord%")
        //             ->select('id','title')
        //             ->get();

            // return the posts with specfic comments length
            $data = DB::table('posts')
                ->join('comments' ,'posts.id' , '=' ,'comments.post_id')
                ->select('posts.id' , 'posts.title', 
                         DB::raw('CHAR_LENGTH(comments.content) as comment_length') )
                ->whereRaw('CHAR_LENGTH(comments.content) > 40')
                        ->get();

           
                    return $data;

     }

     public function test3(){
        // $postID = 170;
        // $tagIds = [1,2,3];

        // foreach( $tagIds  as $tagId){
        //     DB::table('post_tag')->insert([
        //     'post_id' => $postID ,
        //     'tag_id' => $tagId,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        //     }

        // return the post's tags
        // $data = DB::table('posts')
        //          ->join('post_tag' ,'posts.id' , '=' ,'post_tag.post_id')
        //          ->select('posts.*' )
        //         ->where('post_tag.tag_id' , 1)
        //         ->get();
        //     return $data;

            DB::table('post_tag')->where('post_id' , 170)->delete();
     }


     public function test4(){

    //  $user =    User::create([
    //         'name' => "ahmed",
    //         'email' => "a22@gmail.com",
    //         'password' => bcrypt("12345678")
    //     ]);

    //     return $user;
        // $user  = User::find(194);
        // return $user->id_name;


        // $post  = Post::find(161);
        // return $post->title;


        $users =  user::where('is_active',true)->get();
           
           
        return $users;

     }


     
     // casting
     public function test5(){
       // withcasts()
    
        $posts = Post::select([
            'posts.*',
            'comment_avg' => Comment::selectRaw('AVG(id)')
                                        ->whereColumn('post_id' ,'Posts.id')
        ])->withCasts([
            'comment_avg' => 'decimal:2'
        ])
        ->get();

        return $posts;
     }

     public function test6(){
        $users = User::withoutGlobalScopes()->select('name','is_active')
            ->get();
            return $users;
     }
     
     public function test8(){
//  $user = User::find(194);
//         Session::put('user',$user);
// $data = session()->all();
     
    

// dd($data);
        $comments = Comment::all();
        $userComments = $comments->filter(function($comment){
                 return $comment->user_id == session('user');
        });
        dd( $userComments);
      }




     public function index(){
        $users = User::where('is_active', 1)->get();
        return $users;
   }
  
     public function search(Request $request){


        $users = User::where('is_active', 1)
            ->where('id','>', 197)
            ->get();
            return $users;

   }

   public function test7(){

    // each
    // $comments = Comment::all();
    // $comments->each(function ($comment){
    //     unset($comment->created_at);      
    //     //  $comment->content = "comment : " . $comment->content;
    // });

    // filter
//     $comments =  Comment::all()->filter(function ($item){
//         return $item->id > 10;
//     });

//     return $comments->values();

        // $collections = collect([1,3,5,67,8]);
        // $filtered = $collections->filter(function($e){
        //     return $e > 7;
        // });
        // return $filtered->values();

        // pluck
        // $usersNames = User::all()->pluck('name' );
        // return $usersNames;

        // countby
        // $commentCounts = Comment::all()->countBy('post_id');
        // return $commentCounts;

        // map
        // $old_users = User::all();
        // $users = $old_users->map(function ($user){
        //     return [
        //         'User_name' => $user->name,
        //         'User_email' => $user->email,
        //     ];
        // });

        // return $old_users;

        $user = User::find(195);

   //  $users = User::orderBy('days_active')->get();
     $users = User::all()->sortBy('days_active');

        return $users;
    }
}








