<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $postCount = Post::count();
        $userCount = User::count();
        $commentCount = Comment::count();
        $categoryCount = Category::count();
        $logs=UserLog::count();
        return view('admin.dashboard', compact(['postCount', 'userCount', 'commentCount', 'categoryCount','logs']));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function editProfile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('admin.editadmin', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:15',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 4 characters',
            'name.max' => 'Name must be at most 15 characters',
            'email.required' => 'email is required',
            'email.email' => 'Please enter valid email',
            'email.unique' => 'Email already exists',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->save()) {
            return redirect()->route('admin.profile')->with('success', 'Admin updated successfully');
        } else {
            return redirect()->route('admin.profile')->with('error', 'Something went wrong');
        }

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required | min:8',
            'new_password' => 'required | confirmed | min:8',
            'new_password_confirmation' => 'required',
        ], [
            'current_password.required' => 'Current password is required',
            'current_password.min' => 'password must be at least 8 characters',
            'new_password.required' => 'New password is required',
            'new_password.confirmed' => 'New password does not match',
            'new_password.min' => 'New password must be at least 8 characters',
            'new_password_confirmation.required' => 'Confirm password is required',
        ]);
        // dd($user);  
        $user = auth()->user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = $request->new_password;
            if ($user->save()) {
                return redirect()->route('admin.profile')->with('success', 'Password changed successfully.');
            } else {
                return redirect()->route('admin.profile')->with('error', 'Something went wrong.');
            }
        } else {
            return redirect()->route('admin.profile')->with('error', 'Current password is incorrect');
        }
    }

    public function getUsers()
    {
        $users = User::with(['posts', 'comments'])->paginate(5);
        return view('admin.users', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edituser', compact('user'));
    }
    public function updateUser(Request $request, User $user)
    {
        if ($request->filled(['password', 'password_confirmation'])) {
            $request->validate([
                'name' => 'required|min:4|max:15',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|regex:/^[01]$/',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required',
            ], [
                'name.required' => 'Name is required',
                'name.min' => 'Name must be at least 4 characters',
                'name.max' => 'Name must be at most 15 characters',
                'email.required' => 'email is required',
                'email.email' => 'Please enter valid email',
                'email.unique' => 'Email already exists',
                'role.required' => 'Role is required',
                'role.regex' => 'Role must be either Admin or Not Admin',
                'password.required' => 'New password is required',
                'password.confirmed' => 'password does not match',
                'password.min' => 'password must be at least 8 characters',
                'password_confirmation.required' => 'Confirm password is required',

            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = $request->password;
            if ($user->save()) {
                return redirect()->route('admin.users')->with('success', 'User Updated successfully');
            } else {
                return redirect()->route('admin.users')->with('error', 'Something went wrong');
            }
        } else {
            $request->validate([
                'name' => 'required|min:4|max:15',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|regex:/^[01]$/',
            ], [
                'name.required' => 'Name is required',
                'name.min' => 'Name must be at least 4 characters',
                'name.max' => 'Name must be at most 15 characters',
                'email.required' => 'email is required',
                'email.email' => 'Please enter valid email',
                'email.unique' => 'Email already exists',
                'role.required' => 'Role is required',
                'role.regex' => 'Role must be either Admin or Not Admin',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            if ($user->save()) {
                return redirect()->route('admin.users')->with('success', 'User Updated successfully');
            } else {
                return redirect()->route('admin.users')->with('error', 'Something went wrong');
            }
        }
    }

    public function deleteUser(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('admin.users')->with('error', 'Something went wrong');
        }
    }

    public function getPosts()
    {
        $posts = Post::with(['user', 'comments', 'category'])->paginate(5);
        return view('admin.posts', compact('posts'));
    }

    public function editPost(Post $post)
    {
        return view('admin.editpost', compact('post'));
    }

    public function updatePost(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:30',
            'content' => 'required | min:10',
        ], [
            'title.required' => 'Title is required',
            'title.max' => 'Title should not be more than 30 characters',
            'content.required' => 'Content is required',
            'content.min' => 'Content should be atleast 10 characters',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;

        if ($post->save()) {
            return redirect()->route('admin.posts')->with('success', 'Post Updated successfully');
        } else {
            return redirect()->route('admin.posts')->with('error', 'Something went wrong');
        }
    }

    public function deletePost(Post $post)
    {
        if ($post->delete()) {
            return redirect()->route('admin.posts')->with('success', 'Post deleted successfully');
        } else {
            return redirect()->route('admin.posts')->with('error', 'Something went wrong');
        }
    }

    public function getComments()
    {
        $comments = Comment::with(['user', 'post'])->paginate(10);
        return view('admin.comments', compact('comments'));
    }

    public function editComment(Comment $comment)
    {
        return view('admin.editcomment', compact('comment'));
    }
    public function updateComment(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required',
        ], [
            'content.required' => 'Comment is required',
        ]);

        $comment->content = $request->content;

        if ($comment->save()) {
            return redirect()->route('admin.comments')->with('success', 'Comment Updated successfully');
        } else {
            return redirect()->route('admin.comments')->with('error', 'Something went wrong');
        }
    }
    public function deleteComment(Comment $comment)
    {
        if ($comment->delete()) {
            return redirect()->route('admin.comments')->with('success', 'Comment deleted successfully');
        } else {
            return redirect()->route('admin.comments')->with('error', 'Something went wrong');
        }
    }

    public function getCategories()
    {
        $categories = Category::with('posts')->paginate(5);
        return view('admin.category', compact('categories'));
    }

    public function deleteCategory(Category $category)
    {
        if ($category->delete()) {
            return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('admin.categories')->with('error', 'Something went wrong');
        }
    }

    public function addCategory()
    {
        return view('admin.addcategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ], [
            'name.required' => 'Category name is required',
            'name.unique' => 'Category already exists',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($category->save()) {
            return redirect()->route('admin.categories')->with('success', 'Category added successfully');
        } else {
            return redirect()->route('admin.categories')->with('error', 'Something went wrong');
        }
    }

    public function logs(){
        $logs=UserLog::with('user')->orderBy('id','desc')->paginate(10);
        return view('admin.logs',compact('logs'));
    }
}
