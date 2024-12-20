<?php


namespace app\controllers\admin;

class OrderController extends AppController
{
    public function indexAction()
    {
        $page = (int) ($_GET['page'] ?? 1);
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $search = $_GET['search'] ?? '';

        if ($search) {
            $orders = $this->model->get_orders($limit, $offset, $search);
        } else {
            $orders = $this->model->get_orders($limit, $offset);
        }

        $totalOrders = $this->model->get_total_orders($search);
        $totalPages = ceil($totalOrders / $limit);

        $this->setMeta('Sifarişlər');
        $this->set(compact('orders', 'totalPages', 'page'));
    }


    public function deleteAction()
    {
        $order_id = $_GET['id'];

        if (!empty($order_id)) {
            $this->model->order_delete($order_id);
            $_SESSION['success'] = 'Sifariş uğurla silindi!';
        } else {
            $_SESSION['error'] = "Geçersiz kullanıcı ID.";
        }

        redirect();
    }

    public function editAction()
    {
        $order_id = $_GET['id'];
        $confirm = $_GET['confirm'] ?? '';

        if (!empty($order_id)) {
            $order = $this->model->get_order($order_id);


            if ($confirm == 1) {

                $this->model->confirm_order($order_id);

                $_SESSION['success'] = "Sifariş uğurla təsdiqləndi.";
                header('Location: http://e-market.loc/admin/order');
                exit;
            }

        } else {
            $_SESSION['error'] = "Geçersiz sipariş ID.";
        }

        $this->setMeta('Sifariş Detalları');
        $this->set(compact('order'));
    }

}
