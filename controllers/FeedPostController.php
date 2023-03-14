<?php

namespace Api\Controllers;

use Phalcon\Mvc\Controller;
use Api\Models\FeedPosts;
use Phalcon\Http\Response;
use Exception;

class FeedPostController extends Controller
{
    public function handleResponse($resp)
    {
        $response = new Response();
        $response->setHeader('Content-Type', 'application/json');
        $response->setJsonContent($resp);

        return $response;
    }

    public function createPost()
    {
        try {

            $update = $this->request->getJsonRawBody();

            $post = new FeedPosts();

            $post->channel = $update->channel;
            $post->text = $update->text;
            $post->quantity = $update->quantity;
            $post->lead = $update->lead;
            $post->title = $update->title;

            if($post->save() === false) {
                $resp = 'Failed to create post.';
                $this->handleResponse($resp);
            }
            
            $resp = 'Post create successfully.';
            return $this->handleResponse($resp);

        } catch(Exception $e) {

            return $this->handleResponse($e->getMessage());
        }

    }

    public function getPost($id)
    {
        try {

            $feed_post = FeedPosts::findById($id);

            if(count($feed_post) < 1) {
                $resp = "Post not found.";
                return $this->handleResponse($resp);
            }

            return $this->handleResponse($feed_post);

        } catch (Exception $e) {

            return $this->handleResponse($e->getMessage());
        }
    }

    public function updatePost()
    {
        try {

            $update = $this->request->getJsonRawBody();

            $post = FeedPosts::findById($update->id);

            $post->channel = $update->channel;
            $post->text = $update->text;
            $post->quantity = $update->quantity;
            $post->lead = $update->lead;
            $post->title = $update->title;

            return $this->handleResponse($post);

            if($post->save() === false) {
                $resp = 'Failed to update post.';
                $this->handleResponse($resp);
            }
            
            $resp = 'Post updated successfully.';
            return $this->handleResponse($resp);

        } catch(Exception $e) {

            return $this->handleResponse($e->getMessage());
        }
    }

    public function deletePost($id)
    {
        try {

            $feed_post = FeedPosts::findById($id);
        
            if(count($feed_post) < 1) {
                $resp = "Post not found.";
                return $this->handleResponse($resp);
            }
            if($feed_post->delete() === false) {
                $resp = "Failed to delete Post";
                return $this->handleResponse($resp);
            }

            $resp = "Post deleted.";
            return $this->handleResponse($resp);

        } catch(Exception $e) {

            return $this->handleResponse($e->getMessage());
        }
    }

    public function getFeed($type)
    {
        try {
            switch($type) {
                case '1':
                case '2':
                    $feeds = FeedPosts::findByChannel($type);
                    return $this->handleResponse($feeds);
                case 'all':
                    $feeds = FeedPosts::find();
                    return $this->handleResponse($feeds);
                default:
                    $resp = "Type not found.";
                    return $this->handleResponse($resp);
            }
        } catch(Exception $e) {
            return $this->handleResponse($e->getMessage());
        }
    }
}