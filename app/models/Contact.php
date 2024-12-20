<?php

namespace app\models;

use RedBeanPHP\R;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contact extends AppModel
{
    public function saveOrder($cardHolderName)
    {
        if (empty($_SESSION['cart'])) {
            return false;
        }

        foreach ($_SESSION['cart'] as $cartItem) {
            $order = R::dispense('orders');
            $order->user_id = $_SESSION['user']['id'];
            $order->email = $_SESSION['user']['email'];
            $order->address = $_SESSION['user']['address'];
            $order->username = $cardHolderName;
            $order->product_id = $cartItem['id'];
            $order->product_title = $cartItem['title'];
            $order->qty = $cartItem['qty'];
            $order->price = $cartItem['price'];

            $orderID = R::store($order);

            if (!$orderID) {
                return false;
            }
        }

        return true;
    }

    public function sendMail($cardHolderName)
    {
        // PHPMailer obyekti yaradılır
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'c2148a646667d8';
            $mail->Password = '94990c7004e738';
            $mail->Port = 2525;

            // Göndərən və alan tənzimləmələri
            $mail->setFrom('no-reply@example.com', 'Sizin Mağaza');
            $mail->addAddress($_SESSION['user']['email']); // İstifadəçi e-poçtu

            // Mövzu
            $mail->Subject = 'Sifariş Təsdiqi';

            // UTF-8 kodlaşdırması
            $mail->CharSet = 'UTF-8';

            // E-poçt məzmunu
            $body = "<h1>Hörmətli $cardHolderName, sifarişinizə görə təşəkkür edirik!</h1>";
            $body .= "<p>Sifarişinizin detalları aşağıda qeyd olunub:</p>";
            $body .= "<table border='1' style='border-collapse:collapse; width:100%; text-align:left;'>";
            $body .= "<thead>
                        <tr>
                            <th>Məhsul</th>
                            <th>Miqdar</th>
                            <th>Qiymət</th>
                        </tr>
                      </thead>
                      <tbody>";

            // Səbətdəki məhsulları göstər
            foreach ($_SESSION['cart'] as $item) {
                $body .= "<tr>
                            <td>" . htmlspecialchars($item['title']) . "</td>
                            <td>" . (int) $item['qty'] . "</td>
                            <td>" . number_format((float) $item['price'], 2) . "₼</td>
                          </tr>";
            }

            $body .= "</tbody></table>";
            $body .= "<p><strong>Ümumi Məbləğ:</strong> " . number_format((float) ($_SESSION['sum.price'] ?? 0), 2) . "$</p>";
            $body .= "<p>Sizin sifarişiniz ən qısa zamanda icra olunacaq. Təşəkkür edirik!</p>";

            // HTML olaraq e-poçt göndər
            $mail->isHTML(true);
            $mail->Body = $body;

            // Mail göndər
            $mail->send();
            return true;

        } catch (Exception $e) {
            // Xətaları qeyd edin
            error_log('Mail Error: ' . $mail->ErrorInfo);
            return false;
        }
    }


}
