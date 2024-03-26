<?php

namespace App\Repositories;

use App\Iterators\PostSearchIterator;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PostRepository

{
    public function getAllPosts(string $language): LengthAwarePaginator
    {
        return Post::with([
            'translations' => function ($query) use ($language) {
                $query->whereHas('language', function ($query) use ($language) {
                    $query->where('locale', $language);
                });
            },
            'tags',
        ])->paginate(10);
    }

    public function getPostWithTranslation(int $postId, string $language): Model|Builder
    {
        return (new Post)->where('id', $postId)
            ->with([
                'translations' => function ($query) use ($language) {
                    $query->whereHas('language', function ($query) use ($language) {
                        $query->where('locale', $language);
                    });
                },
                'tags',
            ])
            ->firstOrFail();
    }

    public function deletePost(int $postId): bool
    {
        $post = (new Post)->findOrFail($postId);
        if ($post) {
            return (bool)$post->delete();
        } else {
            return true;
        }
    }

    public function searchPosts(string $language, string $searchTerm): PostSearchIterator
    {
        $locale = $language;
        $postTranslations = (new PostTranslation)->whereHas('language', function ($query) use ($locale) {
            $query->where('locale', $locale);
        })
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', "%$searchTerm%")
                    ->orWhere('description', 'LIKE', "%$searchTerm%")
                    ->orWhere('content', 'LIKE', "%$searchTerm%");
            })
            ->with(['post.translations' => function ($query) use ($locale) {
                $query->whereHas('language', function ($query) use ($locale) {
                    $query->where('locale', $locale);
                });
            }])
            ->get();
        $uniquePosts = $postTranslations->pluck('post')->unique();
        return new PostSearchIterator($uniquePosts);
    }


}
