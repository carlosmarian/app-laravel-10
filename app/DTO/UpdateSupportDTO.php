<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{

    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreUpdateSupportRequest $request){
        return new self(
            $request->id,
            $request->subject,
            'A',
            $request->body,
        );
    }

}
