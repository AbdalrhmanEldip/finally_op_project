<?php

namespace App\Http\Controllers\Print;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Auth;
use App\Models\User;
use App\Models\Subscriber;



class SubscribersPdfController extends Controller
{
    public function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    public function pdfById($sid)
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_data_by_id());
     return $pdf->stream();
    }

    public function convert_customer_data_to_html()
    {
     $subscriber_data = Subscriber::where('user_id' , Auth::user()->id)->get();
     $admins = Auth::user();
     $output = '

     <head>
       <title>All Subscribers Data</title>
     </head>


     <style>
     .log
     {
       width:100%;
       height: 150px;
       border:1px solid #000;
       background: #212121;
       font-family: sans-serif;
     }
     .logogym
     {
       display:inline-block;
       width:100%;
       background: #212121;
       height:50px:
       margin:0;
       padding:0;
       text-align:center;
       line-height: 20px;
       color:#fff;
       font-size:2rem;
       font-family: monospace;
     }
     </style>


      <div class="log">
        <h3 class="logogym">'.$admins->logo.'</h3>
      </div>
     ';
     foreach($subscriber_data as $s)
     {
      $output .= '
      <style>
             .logo
             {
               display:inline-block;
               width:100%;
               background: #212121;
               height:50px:
               margin:0;
               padding:0;
               text-align:center;
               line-height: 20px;
               color:#fff;
               font-size:2rem;
               font-family: monospace;
             }
             .table
             {
               width:100%;
               height: 300px;
               border:1px solid #000;
               background: #212121;
               font-family: sans-serif;
             }
             .lanes
             {
               width:100%;
               height:50px;
               background: #212122;
             }
             .lanes div
             {
               float:left;
               width:50%;
               border-right:1px solid #dfe6e9;
               height: 40px;
               line-height: 30px;
               color:#fff;
               padding:0 20px;
               font-weight: bold;
             }
        </style>
                 <div class = "table">

                 <div class = "name_line lanes">
                     <div class = "line_name">Name:</div>
                     <div class = "name">'.$s->name.'</div>
                 </div>
                 <div class = "email_line lanes">
                   <div class = "line_email">Email:</div>
                   <div class = "email">'.$s->email.'</div>
                 </div>
                 <div class = "mobile_line lanes">
                   <div class = "line_mobile">Mobile:</div>
                   <div class = "mobile">'.$s->mobile.'</div>
                 </div>
                 <div class = "payment_line lanes">
                   <div class = "line_payment">Payment:</div>
                   <div class = "payment">'.$s->payment_date.'</div>
               </div>
               <div class = "expire_line lanes">
                   <div class = "line_expire">Expire:</div>
                   <div class = "expire">'.$s->expire_date.'</div>
               </div>
               <div class = "price_line lanes">
                 <div class = "line_price">Price:</div>
                 <div class = "price">'.$s->price.'</div>
                 </div>


        </div>

           ';

     }

     return $output;
    }


    public function convert_data_by_id($sid)
    {
      $s = Subscriber::where('user_id' , Auth::user()->id)->find($sid);
      $admins = Auth::user();
      $pdf = \App::make('dompdf.wrapper');
      $output = '
        <head>
          <title>'.$s->name.' Data</title>
        </head>
      ';

       $output .= '
       <style>
              .logo
              {
                display:inline-block;
                width:100%;
                background: #212121;
                height:50px:
                margin:0;
                padding:0;
                text-align:center;
                line-height: 20px;
                color:#fff;
                font-size:2rem;
                font-family: monospace;
              }
              .table
              {
                width:100%;
                height: 300px;
                border:1px solid #000;
                background: #212121;
                font-family: sans-serif;
              }
              .lanes
              {
                width:100%;
                height:50px;
                background: #212122;
              }
              .lanes div
              {
                float:left;
                width:50%;
                border-right:1px solid #dfe6e9;
                height: 40px;
                line-height: 30px;
                color:#fff;
                padding:0 20px;
                font-weight: bold;
              }
         </style>
         <div class = "table">
                  <h3 class = "logo">'.$admins->logo.'</h3>
                  <div class = "name_line lanes">
                      <div class = "line_name">Name:</div>
                      <div class = "name">'.$s->name.'</div>
                  </div>
                  <div class = "email_line lanes">
                    <div class = "line_email">Email:</div>
                    <div class = "email">'.$s->email.'</div>
                  </div>
                  <div class = "mobile_line lanes">
                    <div class = "line_mobile">Mobile:</div>
                    <div class = "mobile">'.$s->mobile.'</div>
                  </div>
                  <div class = "payment_line lanes">
                    <div class = "line_payment">Payment:</div>
                    <div class = "payment">'.$s->payment_date.'</div>
                </div>
                <div class = "expire_line lanes">
                    <div class = "line_expire">Expire:</div>
                    <div class = "expire">'.$s->expire_date.'</div>
                </div>
                <div class = "price_line lanes">
                  <div class = "line_price">Price:</div>
                  <div class = "price">'.$s->price.'</div>
                </div>
         </div>
            ';


      $pdf->loadHTML($output);
      return $pdf->stream();
    }
}
