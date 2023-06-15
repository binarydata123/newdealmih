<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Product;
use PDF;
use Carbon\Carbon;

class UserRegistrationMail extends Mailable
{
  use Queueable, SerializesModels;

  private $_user;
  private $_key;
  private $_tokens;
  private $_amount;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($key, $user, $tokens = null, $amount = null)
  {


    $this->_user = $user;
    $this->_key = $key;
    $this->_tokens = $tokens;
    $this->_amount = $amount;
    // dd($this);
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build(){
    switch ($this->_key) {
      case 'password-reset':
        return $this->_forgotPassword();
        break;
      case 'register':
        return $this->_register();
        break;
      case 'profile-approve':
        return $this->_profileApprove();
        break;
      case 'listing-product-status':
        return $this->_productStatusChange();
        break;
      case 'listing-product':
        return $this->_productListing();
        break;
      case 'order-product':
        return $this->_orderProduct();
        break;
      case 'create-order':
        return $this->_orderCreate();
        break;
      case 'order-return':
        return $this->_orderReturn();
        break;
      case 'login-email':
        return $this->loginotpcreate();
        break;
        case 'login':
        return $this->_login();
        break;
        case 'admin':
        return $this->_admin();
        break;
      case 'user-notification':
        return $this->_UserNotification();
        break;
      case 'otp-password-reset':
        return $this->_otpforgotPassword();
        break;
    }
  }

  private function _forgotPassword(){
  
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();

    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['name'], $template);
      $template = str_replace('[id]', $this->_user['id'], $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }

  private function _otpforgotPassword(){
  
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();

     // dd($emailTemplate);
     $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      $template = str_replace('[otp]', $this->_user['otp'], $template);

      return $this->view('emails.loginemail')->with(['template' => $template]);
    }
  }

   private function loginotpcreate()
  {

     // dd($this->_user);

      $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      $template = str_replace('[otp]', $this->_user['otp'], $template);

      return $this->view('emails.loginemail')->with(['template' => $template]);
    }
  }
  private function _login()
  {

     // dd($this->_user);

      $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
       // dd ($emailTemplate);
    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      $template = str_replace('[date]', Carbon::now()->toDateTimeString(), $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }


  private function _register()
  {
    // dd($this->_user);
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();

    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      $template = str_replace('[otp]', $this->_user['otp'], $template);

      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }
   private function _admin()
  {
    // dd($this->_user);
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();

    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }
 
  private function _profileApprove()
  {
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      $template = str_replace('[status]', $this->_user['status'], $template);


      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }

  private function _productStatusChange()
  {

    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      $template = str_replace('[product]', $this->_user['product'], $template);
      $template = str_replace('[status]', $this->_user['status'], $template);

      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }

  private function _productListing()
  {
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['username'], $template);
      $template = str_replace('[product]', $this->_user['product'], $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }

  private function _orderProduct()
  {
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    // dd($emailTemplate);
    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['name'], $template);
      $template = str_replace('[product]', $this->_user['product'], $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }

  private function _orderCreate()
  {
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    $this->subject('Dealmih - ' . $emailTemplate->subject);

    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['name'], $template);
      $template = str_replace('[order_message]', $this->_user['order_message'], $template);
      $cart_products = $this->_user['product'];
      $store_owner_product = $this->_user['store_owner_product'];
      if($store_owner_product){
        $loop_template = $store_owner_product;
      } else {
        if($cart_products){
          $loop_template = '';
          $purchase_price = '';
          foreach ($cart_products as $cartproduct) {
            $product = Product::where('id', $cartproduct->product_id)->first();
            $product_title = $product->title;
            $quantity = $cartproduct->quantity;
            $Price = $product->price;
            $purchasePrice = $product->price * $cartproduct->quantity * 100;
            $loop_template .='
                <tr>
                  <td style="font-size:14px;padding: 15px;border: 1px solid black;font-family:Helvetica,Arial,sans-serif;">'.$product_title.'</td>
                  <td style="font-size:14px;padding: 15px;border: 1px solid black;font-family:Helvetica,Arial,sans-serif;">'.$quantity.'</td>
                  <td style="font-size:14px;padding: 15px;border: 1px solid black;font-family:Helvetica,Arial,sans-serif;">'.$purchasePrice.'</td>
                </tr>';

                $template = str_replace('[product_name]', $product->title, $template);
                $template = str_replace('[quantity]', $quantity, $template);
                $template = str_replace('[Price]', $product->price, $template);
            $purchase_price .= $product->price * $cartproduct->quantity;

            $template = str_replace('[total_price]', $this->_user['order_message'], $template);
          }
        }
      }
      $template = str_replace('[cart_product_html]', $loop_template, $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }
  private function _orderReturn()
  {
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    $this->subject('Dealmih - ' . $emailTemplate->subject);
    if ($emailTemplate) {
      $template = $emailTemplate->email_body;
      $template = str_replace('[name]', $this->_user['name'], $template);
      $template = str_replace('[order_message]', $this->_user['order_message'], $template);
      $product_details = $this->_user['product'];
      $order_return_data = $this->_user['order_return_data'];
      if($order_return_data->return_reason == 'not_described'){
        $return_reason = 'Not as described';
      } elseif ($order_return_data->return_reason == 'defective_not_working') {
        $return_reason = 'Defective / Not Working';
      } elseif ($order_return_data->return_reason == 'physical_damage') {
        $return_reason = 'Physical Damage';
      } elseif ($order_return_data->return_reason == 'ordered_wrong_item') {
        $return_reason = 'Ordered wrong Item';
      } else {
        $return_reason = $order_return_data->return_reason;
      }
      $template = str_replace('[retrun_request_id]', $order_return_data->id, $template);
      $template = str_replace('[product_name]', $product_details->title, $template);
      $template = str_replace('[customer_name]', $order_return_data->return_name, $template);
      $template = str_replace('[customer_email]', $order_return_data->return_email, $template);
      $template = str_replace('[customer_phone]', $order_return_data->return_phone, $template);
      $template = str_replace('[return_street_address_1]', $order_return_data->return_street_address_1, $template);
      $template = str_replace('[return_street_address_2]', $order_return_data->return_street_address_2, $template);
      $template = str_replace('[return_city]', $order_return_data->return_city, $template);
      $template = str_replace('[return_state]', $order_return_data->return_state, $template);
      $template = str_replace('[return_postcode_zipcode]', $order_return_data->return_zipcode, $template);
      $template = str_replace('[order_number]', $order_return_data->order_id, $template);
      $template = str_replace('[request_type]', $order_return_data->return_request_type, $template);
      $template = str_replace('[retrun_reason]', $return_reason, $template);
      $template = str_replace('[retrun_described]', $order_return_data->return_description, $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }
  private function _UserNotification()
  {
    $emailTemplate = EmailTemplate::where('key', $this->_key)->first();
    // dd($emailTemplate);
    $this->subject('Dealmih - ' . $this->_user['subject']);
    if ($emailTemplate) {
      $template = $this->_user['email_body'];
      $template = str_replace('[name]', $this->_user['name'], $template);
      return $this->view('emails.welcome')->with(['template' => $template]);
    }
  }
}
