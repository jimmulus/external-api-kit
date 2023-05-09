<?php

namespace App\Services\Api\Dummy;

use App\Services\Api\DataApi;
use App\Enums\CategoryEnum;
use App\Services\Api\Dummy\DTO\CommentData;
use App\Services\Api\Dummy\DTO\PostData;
use App\Services\Api\Dummy\DTO\TodoData;
use App\Services\Api\Dummy\DTO\QuoteData;
use App\Services\Api\Dummy\DTO\UserData;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DummyDataAPI implements DataApi
{
    public function getData(CategoryEnum $category = null, string $search = null, int $limit = null, int $skip = null): Collection
    {
        if (!$category) {
            return Collection::make();
        }
        $parameters = [];
        $url = config('external-apis.dummy.base_url');
        $url .=  $search ? '/'. $category->value .'/search' : '/'. $category->value .'/';

        $search ? $parameters['q'] = $search : false;
        $limit ? $parameters['limit'] = $limit : false;
        $skip ? $parameters['skip'] = $skip : false;

        count($parameters) > 0 ? $url = $url . '?'.  http_build_query($parameters) : false;

        return $this->doRequest($url, $category);
    }

    public function doRequest(string $url, CategoryEnum $category): Collection
    {
        try {
            $response = Http::get($url);
            if (!$response->successful()) {
                return Collection::make();
            }
            $data = $response->json();
            $data = $data[$category->value];

            switch($category->value) {
                case CategoryEnum::POSTS->value:
                    return collect($data)
                        ->map(function ($post) {
                            return new PostData(
                                title: $post['title'],
                                body: $post['body'],
                                userId: $post['userId'],
                                tags: $post['tags'],
                                reactions: $post['reactions']
                            );
                        });
                case CategoryEnum::COMMENTS->value:
                    return collect($data)
                        ->map(function ($comment) {
                            return new CommentData(
                                id: $comment['id'],
                                body: $comment['body'],
                                completed: $comment['completed'],
                                postId: $comment['postId'],
                                user: $comment['user']
                            );
                        });
                case CategoryEnum::USERS->value:
                    return collect($data)
                            ->map(function ($user) {
                                return new UserData(
                                    id: $user['id'],
                                    firstName: $user['firstName'],
                                    lastName: $user['lastName'],
                                    maidenName: $user['maidenName'],
                                    gender: $user['gender'],
                                    email: $user['email'],
                                    bank: $user['bank'],
                                    company: $user['company'],
                                );
                            });
                    break;
                case CategoryEnum::QUOTES->value:
                    return collect($data)
                            ->map(function ($quote) {
                                return new QuoteData(
                                    id: $quote['id'],
                                    quote: $quote['quote'],
                                    author: $quote['author'],
                                );
                            });
                    break;
                case CategoryEnum::TODOS->value:
                    return collect($data)
                            ->map(function ($todo) {
                                return new todoData(
                                    id: $todo['id'],
                                    todo: $todo['todo'],
                                    completed: $todo['completed'],
                                    userId: $todo['userId'],
                                );
                            });
                    break;
                default:
                    return Collection::make();
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return Collection::make();
        }
    }
}
