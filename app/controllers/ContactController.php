<?php

namespace app\controllers;

use Valitron\Validator;


/** @property Contact $model */
class ContactController extends AppController
{



    public function indexAction()
    {

        $this->setMeta('Ödəniş');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $cardHolderName = $_POST['cardHolderName'] ?? '';
            $cardNumber = $_POST['cardNumber'] ?? '';
            $expiryMonth = $_POST['expiryMonth'] ?? '';
            $expiryYear = $_POST['expiryYear'] ?? '';
            $cvv = $_POST['cvv'] ?? '';


            $v = new Validator([


                'cardHolderName' => $cardHolderName,
                'cardNumber' => $cardNumber,
                'expiryMonth' => $expiryMonth,
                'expiryYear' => $expiryYear,
                'cvv' => $cvv
            ]);




            $v->rule('required', 'cardHolderName')->message('Zəhmət olmasa kart sahibinin adını daxil edin');

            $v->rule('required', 'cardNumber')->message('Zəhmət olmasa kart nömrəsini daxil edin');
            $v->rule('numeric', 'cardNumber')->message('Kart nömrəsi yalnız rəqəmlərdən ibarət olmalıdır');
            $v->rule('lengthMin', 'cardNumber', 16)->message('Kart nömrəsi ən azı 16 rəqəm olmalıdır');


            $v->rule('required', 'expiryMonth')->message('Zəhmət olmasa son istifadə ayını seçin');
            $v->rule('required', 'expiryYear')->message('Zəhmət olmasa son istifadə ilini seçin');

            $v->rule('required', 'cvv')->message('Zəhmət olmasa CVV kodunu daxil edin');
            $v->rule('numeric', 'cvv')->message('CVV yalnız rəqəmlərdən ibarət olmalıdır');
            $v->rule('lengthMin', 'cvv', 3)->message('CVV ən azı 3 rəqəm olmalıdır');



            if (!$v->validate()) {
                $_SESSION['errors'] = $v->errors();
                header("Location: http://e-market.loc/contact");
                exit;
            } else {
                if ($this->model->saveOrder($cardHolderName)) {
                    $this->model->sendMail($cardHolderName);
                    unset($_SESSION['cart']);
                    unset($_SESSION['sum.qty']);
                    unset($_SESSION['sum.price']);
                    $_SESSION['success'] = "Sifarişiniz üçün təşəkkür edirik. Tezliklə menecer sifarişlə razılaşmaq üçün sizinlə əlaqə saxlayacaq";
                    header("Location: http://e-market.loc/");
                    exit;
                }

            }

        }



    }

}
