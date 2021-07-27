<?php

if(! function_exists('qrCode')) {
    function qrCode($target, $type) {
        return \SimpleSoftwareIO\QrCode\Facades\QrCode::format($type)->size(200)->generate($target);
    }
}

if(! function_exists('certificateQr')) {
    function certificateQr($code = null,$type = 'svg') {
        return qrCode(url('/certificates/'.$code),$type);
    }
}

