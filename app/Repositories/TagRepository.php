<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

class TagRepository
{
    public function getAllTags(): LengthAwarePaginator
    {
        return (new Tag)->paginate(10);
    }

    public function getTagById($id): ?Tag
    {
        return (new Tag)->find($id);
    }

    public function createTag(array $tagData): Tag
    {
        return (new Tag)->create($tagData);
    }

    public function updateTag(array $tagData, int $id): Tag
    {
        $tag = (new Tag)->find($id);
        $tag->update($tagData);

        return $tag;
    }

    public function deleteTag(int $id): JsonResponse
    {
        $tag = (new Tag)->find($id);

        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }
        if ($tag->delete()) {
            return response()->json(['message' => 'Tag deleted successfully']);
        }
        return response()->json(['message' => 'Failed to delete tag'], 500);
    }
}
