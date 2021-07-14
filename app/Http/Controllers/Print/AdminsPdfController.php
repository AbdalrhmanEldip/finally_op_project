<?php

namespace App\Http\Controllers\Print;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Auth;
use App\Models\User;
use App\Models\Subscriber;



class AdminsPdfController extends Controller
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
     $admins_data = User::where('is_owner' , 0)->get();
     $output = '

     <head>
       <title>All Admins Data</title>
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
        <h3 class="logogym">Admins</h3>
      </div>
     ';
     foreach($admins_data as $ad)
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
                     <div class = "name">'.$ad->admin_name.'</div>
                 </div>
                 <div class = "password_line lanes">
                   <div class = "line_email">Password:</div>
                   <div class = "password">'.$ad->ptp.'</div>
                 </div>
                 <div class = "mobile_line lanes">
                   <div class = "line_mobile">Logo:</div>
                   <div class = "mobile">'.$ad->logo.'</div>
                 </div>
              </div>
      ';
     }
     $output .= '</table>';
     return $output;
    }


    public function convert_data_by_id($aid)
    {
      $admin_data = User::find($aid);
      $pdf = \App::make('dompdf.wrapper');
      $output = '
      <head>
        <title>'.$admin_data->admin_name.' Data</title>
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
         <h3 class="logogym">Admins</h3>
       </div>
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

                  <div class = "name_line lanes">
                      <div class = "line_name">Name:</div>
                      <div class = "name">'.$admin_data->admin_name.'</div>
                  </div>
                  <div class = "password_line lanes">
                    <div class = "line_email">Password:</div>
                    <div class = "password">'.$admin_data->ptp.'</div>
                  </div>
                  <div class = "mobile_line lanes">
                    <div class = "line_mobile">Logo:</div>
                    <div class = "mobile">'.$admin_data->logo.'</div>
                  </div>
               </div>
       ';

      $output .= '</table>';
      $pdf->loadHTML($output);
      return $pdf->stream();
    }
}
