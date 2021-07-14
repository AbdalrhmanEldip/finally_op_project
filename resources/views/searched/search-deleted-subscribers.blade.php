<!DOCTYPE html>
<html lang="en">
<head>
    <title>USERS || Deleted || Page</title>
    <!--------Tilte------------------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------Meta------------------->
    <link rel="stylesheet" href="../main.css/main-dash.css">
    <link rel="stylesheet" href='../Global.css/font-awesome.min.css'>
    <link rel="stylesheet" href="../Global.css/main.css">
    <link rel="stylesheet" href="../main.css/main-dash-media.css">
    <!--------Links------------------->
</head>
<body>
    <!----- Load || animation ||  START---->
    <div class="parent_load">
        <div class="load_line1 load"></div>
        <div class="load_line2 load"></div>
        <div class="load_line3 load"></div>
        <div class="load_line4 load"></div>
    </div>
    <!----- Load || animation ||  END---->
  <img src="../images/back.png" alt="" class="back_image">
    <!---------HEADER || START--------->
        <header>
            <div class="logo">
                <h2>{{ $admins->logo }}</h2>
            </div>  <!----Logo---->



            <div class="header_icons_contorls">
                <i class="fa fa-cog"></i>
                <i class="fa fa-bars"></i>
            </div><!----Header || Icons || Cotnrols ---->
        <a class="fa fa-arrow-left" href="/deleted-user/{{ $admins->id }}"></a>
        </header>
    <!---------HEADER || END--------->

    <!--------- TABLE || START --------->
    <div class="table">
        <div class="main_row">
            <div>اسم المستخدم</div>
            <div>البريد الاكتروني</div>
            <div>رقم الهاتف</div>
            <div>تاريخ الدفع</div>
            <div>تاريخ الانتهتاء</div>
            <div>قيمه الاشتراك</div>
            <div class="main_row_contorls_icons">
                <a href="/deleted-subscribers-pdf-details" target="_blank" class="fa fa-print"></a>
            </div><!---- Main || Row || Control || Icons ---->
        </div><!---- Mian || Row ---->
<!--====== STANDER || DATA ==========-->
    <div class="main_row" id="dynamicRow">

      @if($deletedSubs->isNotEmpty())
            @foreach($deletedSubs as $subscriber)
                    <div class="table_cell">{{ $subscriber->name }}</div>
                    <div class="table_cell">{{ $subscriber->email }}</div>
                    <div class="table_cell">{{ $subscriber->mobile }}</div>
                    <div class="table_cell">{{ $subscriber->payment_date }}</div>
                    <div class="table_cell">{{ $subscriber->expire_date }}</div>
                    <div class="table_cell">{{ $subscriber->price }}</div>
                    <div class="table_cell">
                    <a href="/deleted-subscribers-pdf-details/{{ $subscriber->id }}" target="_blank" class="fa fa-print"></a>
                    <a href="/restore-user/{{$subscriber->id}}" class="fa fa-repeat"></a>

                   </div>
          @endforeach
      @else
      <div class="alert alert-danger"><p> لا يوجد نتائج مطابقة للبحث </p></div>
     @endif
     </div>
<!--====== STANDER || DATA ==========-->
    </div>
    <!--------- TABLE || END --------->


    <!--------- TABLE ||SMALL || MEDIA || START --------->
    <div class="small_media_table">
            <form action="#" class="search_inp_2">
                <input type="text" placeholder="البحث...">
                <button><i class="fa fa-search"></i></button>
                <input class = 'search_btn-sm-media' type="submit" name="" id="" value="بحث">
            </form><!---- Search || Input ---->
    </div>
    <!--------- TABLE ||SMALL || MEDIA || END --------->


    <!--------- FORM ||SMALL || MEDIA || START --------->
    @foreach($deletedSubs as $subscriber)
    <form class="get_data_form control_form" method="post">
        <span class="form_close">X</span>
        <h1>تعديل البينات</h1>
        <input type="date" value="{{ $subscriber->payment_date }}">
        <input type="date" value="{{ $subscriber->expire_date }}">
        <a href="/restore-user/{{$subscriber->id}}" class = "del_back">تغير</a>
    </form>
    @endforeach
    <!--------- FORM ||SMALL || MEDIA || END --------->

    <!--------- MAIN || START --------->
    <main>
        <div class="users">
            <button>
                <a href="/dashboard/{{ $admins->id }}"><i class="fa fa-users"></i></a>
            </button>
        </div><!---- Users ---->

        <div class="del_users">
            <button>
                <i class="fa fa-trash-o"></i>
            </button>
        </div><!---- Del || Users ---->

        <div class="users_data">
            <button>
                <a href="/data/{{ $admins->id }}"><i class="fa fa-pie-chart"></i></a>
            </button>
        </div><!---- Users || Data ---->
    </main>
    <!--------- MAIN || END --------->

    <!--------- COGS || BAR || START --------->
    <div class="cogs_bar">
        <span class="cogs_bar_close">X</span>
        <button style="opacity: .3;pointer-events: none;"><i class="fa fa-plus"></i></button>
    </div>
    <!--------- COGS || BAR || END --------->

    <!-----FOOTER || START---->
    <footer>
        <div class="reserve">
           <span>Copyright © Al Deeb Company 2021 All Rights Reserved</span>
           <i class="fa fa-level-up"></i>
        </div><!-----Reserve----->
    </footer>
    <!-----FOOTER || End---->


    <!--------SCRIPT || SRCS || START---------->
    <script src="../main.js/del-dash.js"></script>
    <script src="../main.js/main.js"></script>
    <!--------SCRIPT || SRCS || END---------->

</body>
</html>
