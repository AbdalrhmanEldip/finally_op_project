<!DOCTYPE html>
<html lang="en">
<head>
    <title>USERS || Page</title>
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

    <!---------HEADER || START--------->
        <header>
            <div class="logo">
                <h2>{{ $admins->logo }}</h2>
            </div>  <!----Logo---->



            <div class="header_icons_contorls">
                <i class="fa fa-cog"></i>
                <i class="fa fa-bars"></i>
            </div><!----Header || Icons || Cotnrols ---->
            <a class="fa fa-arrow-left" href="../"></a>
        </header>




    <!---------HEADER || END--------->

    <!--------- TABLE || START --------->
    <div class="table">

        <div class="main_row active_color">
            <div>اسم المستخدم</div>
            <div>البريد الاكتروني</div>
            <div>رقم الهاتف</div>
            <div>تاريخ الدفع</div>
            <div>تاريخ الانتهتاء</div>
            <div>قيمه الاشتراك</div>
            <div class="main_row_contorls_icons">
                <a href="/subscribers-pdf-details" target="_blank" class="fa fa-print"></a>
                <i class="fa fa-plus"></i>
            </div>

        </div>
        <div class="main_row" id="dynamic-row">
      @if($searchedSubs->isNotEmpty())
          @foreach($searchedSubs as $ssub)
                    <div class="table_cell">{{ $ssub->name }}</div>
                    <div class="table_cell">{{ $ssub->email }}</div>
                    <div class="table_cell">{{ $ssub->mobile }}</div>
                    <div class="table_cell">{{ $ssub->payment_date }}</div>
                    <div class="table_cell">{{ $ssub->expire_date }}</div>
                    <div class="table_cell">{{ $ssub->price }}</div>
                    <div class="table_cell">
                        <a href="/pdf-details/{{ $ssub->id }}" target="_blank" class="fa fa-print"></a>
                        <i class="fa  fa-pencil-square-o"></i>
                        <a href="/userdelete/{{$ssub->id}}" class="fa fa-trash-o"></a>
                    </div>
            @endforeach
        @else
        <div class="alert alert-danger"><p>  لا يوجد نتائج مطابقة للبحث  </p></div>
        @endif
        </div>
        </div>
    </div>

    <!--------- TABLE ||SMALL || MEDIA || START --------->
    <div class="small_media_table">
        <div class="search_inp_2">
            <input type="text" placeholder="البحث..." id = 'get_data_inp'>
            <button><i class="fa fa-search"></i></button>
            <input class = 'search_btn-sm-media' type="submit" name="" id="" value="بحث">
        </div><!---- Search || Input ---->
    </div>
    <!--------- TABLE ||SMALL || MEDIA || END --------->

    <!--------- FORM ||SMALL || MEDIA || START --------->

  @foreach ($searchedSubs as $ssub)

    <form class="get_data_form control_form" method="post" action="/update-data/{{ $ssub->id }}">
        {{ csrf_field() }}

        <span class="form_close">X</span>
        <h1>تعديل البينات</h1>


        <input type="text" name="name"   id="name"   value="{{ $ssub->name }}">
        <input type="text" name="email"  value="{{ $ssub->email }}">
        <input type="number" name="mobile" value="{{ $ssub->mobile }}">
        <input type="date" name="p_date" value="{{ $ssub->payment_date }}">
        <input type="date" name="e_date" value="{{ $ssub->expire_date }}">
        <input type="text" name="price"  value="{{ $ssub->price }}&pound">
        <input type="submit" value="تعديل">
    </form>
  @endforeach

 @foreach ($searchedSubs as $ssub)
  <form class="get_data_form_2 control_form">
        {{ csrf_field() }}

        <span class="form_close form_close_2">X</span>
        <h1>تعديل البينات</h1>

        <input type="text" name="name" value="{{ $ssub->name }}" id = 'name_search_inp'>
        <input type="text" name="email" value="{{ $ssub->email }}">
        <input type="number" name="mobile" value="{{ $ssub->mobile }}">
        <input type="date" name="p_date" value="{{ $ssub->payment_date }}">
        <input type="date" name="e_date" value="{{ $ssub->expire_date }}">
        <input type="text" name="price" value="{{ $ssub->price }}&pound">
        <input type="submit" value="تعديل">
    </form>
  @endforeach

    <!--------- FORM ||SMALL || MEDIA || END --------->

    <!--------- FORM ||BIG || MEDIA || START --------->

    <form class="set_data_form control_form" action="/save-details" method="post">
        {{ csrf_field() }}


        <span class="form_close">X</span>
        <h1>ادخال البينات</h1>
        <input type="text" name="username" placeholder="اسم المشترك" required>

        <input type="text" name="email" placeholder="بريد المشترك" required>
         @error('email')
            <?php echo "<script type='text/javascript'>alert('".$message."');</script>"; ?>
        @enderror

        <input type="number" name="mobile" placeholder="رقم هاتف المشترك" required>
        @error('mobile')
            <?php echo "<script type='text/javascript'>alert('".$message."');</script>"; ?>
        @enderror

        <input type="date" name="p_date" placeholder="تاريخ الدفع" required>
        <input type="date" name="expire" placeholder="تاريخ الانتهاء" required>
        <input type="number" name="price" placeholder="قيمه الاشتراك" required>
        <input type="submit" value="اضافه">

    </form>



    <!--------- FORM ||BIG || MEDIA ||END --------->

    <!--------- MAIN || START --------->
    <main>
        <div class="users">
            <button>
                <i class="fa fa-users"></i>
            </button>
        </div><!---- Users ---->

        <div class="del_users">
            <button>
                <a href="/deleted-user/{{ $admins->id }}"><i class="fa fa-trash-o"></i></a>
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
        <button><i class="fa fa-plus"></i></button>
        <button><a href="/erase/{{ $admins->id }}" class="fa fa-eraser"></a></button>
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
    <script src="../main.js/main-dash.js"></script>
    <script src="../main.js/main.js"></script>
    <!--------SCRIPT || SRCS || END---------->

</body>
</html>
