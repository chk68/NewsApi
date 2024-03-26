<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    protected PostService $postService;
    protected PostRepository $postRepository;

    public function __construct(PostService $postService, PostRepository $postRepository)
    {
        $this->postService = $postService;
        $this->postRepository =$postRepository;
    }

    public function index(): JsonResponse
    {
        $language = request()->query('lang', 'en');
        $post = $this->postService->getAllPosts($language);
        return response()->json(['post' => $post]);
    }

    public function show(int $postId): JsonResponse
    {
        $language = request()->query('lang', 'en');
        $post = $this->postService->getPostWithTranslation($postId, $language);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json(['post' => $post]);
    }

    public function store(PostStoreRequest $request): JsonResponse
    {
        $postData = $request->only(['translations', 'tag']);
        $post = $this->postService->createPost($postData);
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }

    public function update(int $postId): JsonResponse
    {
        $postData = request()->all();
        $this->postService->updatePost($postData, $postId);
        return response()->json(['message' => 'Post updated successfully'], 201);
    }

    public function destroy(int $postId): JsonResponse
    {
        $this->postService->deletePost($postId);
        return response()->json(['message' => 'Successful'], 204);
    }

    public function search(): JsonResponse
    {
        $searchLanguage = request()->input('lang');
        $searchTerm = request()->input('search');
        $postIterator = $this->postRepository->searchPosts($searchLanguage, $searchTerm);
        $posts = iterator_to_array($postIterator);

        if (empty($posts)) {
            return response()->json(['message' => 'Результатов нет'], 404);
        }
        return response()->json(['posts' => $posts]);
    }

    public function updateTag(int $postId): JsonResponse
    {
        $tagData = request()->all();
        return $this->postService->updateTag($tagData, $postId);
    }
}

