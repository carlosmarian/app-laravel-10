<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupportRequest;

class CreateSupportDTO
{

    public function __construct(
        public string $subject,
        public string $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreUpdateSupportRequest $request){
        return new self(
            $request->subject,
            'A',
            $request->body,
        );
    }

}
