<?php

namespace Aydin0098\Course\Responses;

use Illuminate\Http\Response;

class AjaxResponses
{

    public static function success()
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد'],Response::HTTP_OK);


    }

    public static function Failed()
    {
        return response()->json(['message' => 'خطا در انجام عملیات'],Response::HTTP_INTERNAL_SERVER_ERROR);
    }

}
