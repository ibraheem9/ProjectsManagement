<?php

function sendResponse(
    $data = '' , $message = '' , $status = true , $code = 200 ,
    $auth_data = null , $temp = null , $meta = null
)
{
    ini_set('serialize_precision' , -1);

    $result = [
        'status' => $status ,
        'code'   => $code ,
        'msg'    => $message ,
        'data'   => $data ,
    ];
    if ($auth_data)
    {
        $result['auth_data'] = $auth_data;
    }
    if (config('app.env') == "local")
    {
        if ($temp)
        {
            $result['temp'] = $temp;
        }
    }
    if ($meta)
    {
        $result['meta'] = $meta;
    }
    return response()->json($result)->setStatusCode($code);
}

