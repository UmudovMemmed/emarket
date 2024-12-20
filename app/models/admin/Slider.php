<?php


namespace App\Models\Admin;

use RedBeanPHP\R;
use app\models\AppModel;

class Slider extends AppModel
{
    public function get_sliders()
    {
        return R::getAll("SELECT * FROM `sliders`");
    }

    public function slider_delete($id)
    {
        if (!empty($id) && is_numeric($id)) {

            return R::exec("DELETE FROM `sliders` WHERE id = ?", [$id]);
        }

        return false;
    }




}
