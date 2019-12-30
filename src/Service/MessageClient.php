<?php


namespace App\Service;

use App\Util\Rot13Transformer;


class MessageClient
{

    private $transformer;


    public function __construct(Rot13Transformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function messageEncode($message)
    {
        $transformedStatus = $this->transformer->transform($message);

        return $transformedStatus;
    }

}
