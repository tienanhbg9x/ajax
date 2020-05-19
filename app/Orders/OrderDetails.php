<?php


namespace App\Orders;


use App\Billing\PaymentGateway;

class OrderDetails
{
    /**
     * @var PaymentGateway
     */
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(500);
        return [
            'name' => 'Tien Anh',
            'address' => 'Bac Giang city'
        ];
    }
}
