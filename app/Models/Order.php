<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalInEuros()
    {
        return $this->price / 100;
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function getPaymentMethodName()
    {
        switch ($this->payment) {
            case 'paypal':
                return 'PayPal';
            case 'stripe':
                return 'Carte de banque';
            case 'cash':
                return 'En espèce';
            case 'transfer':
                return 'Virement';
            default:
                return 'Inconnu';
        }
    }

    public function getShippingMethodName()
    {
        switch ($this->shipping) {
            case 'shipping':
                return 'Livraison';
            case 'collect':
                return 'Retrait à la brasserie';
            default:
                return 'Inconnu';
        }
    }

    public function getShippingAddress()
    {
        return $this->shipping_first_name . ' ' . $this->shipping_last_name . ', ' . $this->shipping_number . ' ' . $this->shipping_street . ', ' . $this->shipping_city . ', ' . $this->shipping_zip . ', ' . $this->shipping_country;
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            if ($model->status == "finished") {
                $config = \SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', ENV('SENDINBLUE'));
                $apiInstance = new \SendinBlue\Client\Api\TransactionalEmailsApi(
                    new \GuzzleHttp\Client(),
                    $config
                );
                $to = ["email" => $model->billing_email];
                $products = "";
                foreach ($model->items as $item) {
                    $products = $products . " " . $item->quantity . "x " . $item->product->name;
                }
                $params = [
                    "BILLING_FIRST_NAME" => $model->billing_first_name,
                    "ORDER_ID" => $model->id,
                    "ORDER_PRODUCTS" => $products,
                    "SHIPPING_METHOD_TITLE" => $model->getShippingMethodName(),
                ];
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
                $sendSmtpEmail["sender"] = new \SendinBlue\Client\Model\SendSmtpEmailSender(["name" => env("SENDINBLUE_NAME"), "email" => env("SENDINBLUE_EMAIL")]);
                $sendSmtpEmail["to"] = [new \SendinBlue\Client\Model\SendSmtpEmailTo($to)];
                $sendSmtpEmail["templateId"] = 22;
                $sendSmtpEmail["params"] = $params;
                $sendSmtpEmail["replyTo"] = new \SendinBlue\Client\Model\SendSmtpEmailReplyTo(["email" => env("SENDINBLUE_EMAIL")]);
                $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            }
        });
    }
}
