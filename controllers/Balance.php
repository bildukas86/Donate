<?php

class Balance {
    public function index() {
        // order / item number
        $itemNumber = md5(time());
        
        // mokejimai
        try {
            $request = WebToPay::buildRequest(array(
                'projectid'     => Settings::get('app.mokejimai.id'),
                'sign_password' => Settings::get('app.mokejimai.secret'),
                'amount'        => 0,
                'orderid'       => $itemNumber,
                'paytext'	=> Settings::get('app.mokejimai.text') . ' (nr. [order_nr]) ([site_name])',
                'accepturl'     => Settings::get('app.base_url') . '/pay.php?id=mokejimai&action=verify',
                'cancelurl'     => Settings::get('app.base_url') . '/pay.php?id=mokejimai&action=cancel',
                'callbackurl'   => Settings::get('app.base_url') . '/pay.php?id=mokejimai&action=notify',
                'version'	=> Settings::get('app.mokejimai.version'),
                'test'          => Settings::get('app.mokejimai.test')
            ));
        } catch (WebToPayException $e) {
            echo $e->getMessage();
        }
        
        return View::make('balance', ['itemNumber' => $itemNumber, 'hiddenInputs' => $request]);
    }
}