<?php

namespace App\Http\Controller;

use Lib\Base\Connection;
use App\Post;

/**
 * Post CRUD controller
 */
class PostsController extends Controller
{
    public function __construct(Connection $conn)
    {
        if (!in_array($conn->param('route'), ['posts.store', 'posts.update'])) {
            $conn->layout('layouts.main');
        }
    }

    /**
     * @param Connection $conn
     * @return Connection
     */
    public function index(Connection $conn)
    {
//        $posts = Post::find()->latest()->all();
        return $conn->view('posts.index');
    }

    public function view(Connection $conn)
    {
        $id = $conn->param('routeParams')['id'];
        return $conn->view('posts.view')->assign('id', $id);
    }
}