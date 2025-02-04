<?php

namespace App\controller;

use App\core\Controller;
use App\Model\Tag;

class TagController extends Controller
{
    public function getAllJson($query) {
        echo json_encode(Tag::searchTag($query));
    }
}