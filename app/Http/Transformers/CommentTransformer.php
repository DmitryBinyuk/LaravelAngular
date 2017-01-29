<?php

namespace App\Http\Transformers;

use App\Models\Phone;
use App\Models\Comment;
use League\Fractal\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'phone'
    ];

    protected $detailed;

    public function __construct($detailed = false)
    {
        $this->detailed = $detailed;
    }

    public function transform(Comment $comment)
    {
        $phone = $comment->phone()->first();

        $data = [
            'id' => (int) $comment->id,
            'text' => $comment->text,
            'author' => $comment->author,
            'phone_id' => $phone ? $phone->id : null,
        ];

        return $data;
    }

    public function includePhone(Phone $phone)
    {
        return $comment->phone ? $this->item($comment->phone, new PhoneTransformer()) : null;
    }
}