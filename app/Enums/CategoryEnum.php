<?php
namespace App\Enums;

enum CategoryEnum : string
{
    case PRODUCTS = 'products';
    case CARTS = 'carts';
    case USERS = 'users';
    CASE POSTS = 'posts';
    CASE COMMENTS = 'comments';
    CASE QUOTES = 'quotes';
    CASE TODOS = 'todos';
}
