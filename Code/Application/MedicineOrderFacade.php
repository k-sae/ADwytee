<?php
/**
 * Created by PhpStorm.
 * User: billy
 * Date: 4/29/19
 * Time: 10:33 PM
 */

class MedicineOrderFacade
{
    private $order;
    private $orderManager;
    private $medicine_order;
    private $file_name = '../../Application/order.php';
    private $file_name2 = '../../Application/orderManger.php';
    private $file_name3 = '../../Application/medicineOrder.php';


    function __construct()
    {
        try {
            include_once($this->file_name);
            include_once($this->file_name2);
            include_once($this->file_name3);

            $this->order = new Order();
            $this->orderManager = new orderManger();
            $this->medicine_order = new MedicineOrder();

        } catch (Exception $e) {
            echo "error in file name";
        }
    }

    public function orderMedicine() {

        $this->medicine_order->amount = $_POST['amount'];
        $this->medicine_order->medicine_id = ($_GET['code']);

        $this->order->pharmacy = ($_GET["phar"]);
        $this->order->user = ($_SESSION['userId']);
        $this->order->medicine_order = $this->medicine_order;

        $this->orderManager->newOrder($this->order);

    }

}