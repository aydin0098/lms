<?php

namespace Aydin0098\Category\Responses;

class AjaxResponses
{

    public static function success()
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد'],200);


    }

}
