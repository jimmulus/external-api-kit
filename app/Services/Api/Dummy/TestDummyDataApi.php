<?php

namespace App\Services\Api\Dummy;

use App\Services\Api\DataApi;
use App\Services\Api\Dummy\DTO\CommentData;
use App\Services\Api\Dummy\DTO\PostData;
use App\Services\Api\Dummy\DTO\TodoData;
use App\Services\Api\Dummy\DTO\QuoteData;
use App\Services\Api\Dummy\DTO\UserData;
use App\Enums\CategoryEnum;
use Illuminate\Support\Collection;

class TestDummyDataAPI implements DataApi
{
    public function getData(CategoryEnum $category = null, string $search = null, int $limit = null, int $skip = null): Collection
    {
        $data = Collection::make();

        switch($category->value) {
            case CategoryEnum::POSTS->value:
                $data->add(new PostData(
                    title: 'Post 1',
                    body: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore officia magni aperiam id minima! Voluptatibus autem perferendis ipsum magni consequuntur veniam, nam repellendus, sunt ipsa libero aliquam excepturi nihil eum?',
                    userId: 99,
                    tags: ['Tag 1', 'Tag 2'],
                    reactions: 2
                ));
                break;
            case CategoryEnum::COMMENTS->value:
                $data->add(new CommentData(
                    id: 10,
                    body: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod error impedit earum, nisi magni sed soluta beatae suscipit nobis in consequatur porro pariatur temporibus odit quia. Quisquam praesentium debitis ab!',
                    completed: true,
                    postId: 901,
                    user: ['id' => 1, 'username' => 'cmasurel1x']
                ));
                break;
            case CategoryEnum::USERS->value:
                $data->add(new UserData(
                    id: 10,
                    firstName: 'Terry',
                    lastName: 'Medhurst',
                    maidenName: 'Smitham',
                    gender: 'male',
                    email: 'atuny0@sohu.com',
                    bank: [
                        'cardExpire'=> '06/22',
                        'cardNumber'=> '50380955204220685',
                        'cardType'=> 'maestro',
                        'currency'=> 'Peso',
                        'iban'=> 'NO17 0695 2754 967'
                    ],
                    company: ['address' =>  [
                        'address' => '629 Debbie Drive',
                        'city' =>  'Nashville',
                        'coordinates' => [
                            'lat' => 36.208114,
                            'lng'=> -86.58621199999999
                        ],
                        'postalCode' => '37076',
                        'state' => 'TN'
                        ],
                        'department' => 'Marketing',
                        'name' => 'Blanda-O\'Keefe',
                        'title' => 'Help Desk Operator'
                    ]
                ));
                break;
            case CategoryEnum::QUOTES->value:
                $data->add(new QuoteData(
                    id: 10,
                    quote: 'The most difficult thing is the decision to act, the rest is merely tenacity.',
                    author: 'Amelia Earhart',
                ));
                break;
            case CategoryEnum::TODOS->value:
                $data->add(new todoData(
                    id: 6,
                    todo: 'Bake pastries for me and neighbor',
                    completed: false,
                    userId: 39,
                ));
                break;
            default:

        }

        return $data;
    }
}
