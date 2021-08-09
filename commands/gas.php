<?php
    try {

        $result = General::newHttpRequest("https://api.etherscan.io/api?module=gastracker&action=gasoracle&apikey=$ethScanKey");
        if ($result["status"] === 200 && is_object($result["response"])) {
            $low = $result["response"]->result->SafeGasPrice;
            $mid = $result["response"]->result->ProposeGasPrice;
            $high = $result["response"]->result->FastGasPrice;
            $response = "$fuelpump <b>Current gas prices (GWEI)</b> $fuelpump \n Low: $low \n Average: $mid \n High: $high";
        } else {
            throw new Exception();
        }

    } catch (Exception $e) {
        $response = "Sorry, something went wrong with /gas";
    }
?>