<!DOCTYPE html>
<html lang="en">
<head>
    <title>USERS || Data || Page</title>
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
        </header>
    <!---------HEADER || END--------->


        <!--------- TABLE_2 || START --------->
        <div class="table_2_small">
            <div class="table_2_small_main">
                <div>
                    <span class="table_2_small_text_data">{{ $subCount }}</span>
                    <span><i class="fa fa-users"></i> المشتركين</span>
                </div>
                <div>
                    <span class="table_2_small_text_data">{{ $result }}</span>
                    <span><i class="fa fa-users"></i> المشتركين الجدد</span>
                </div>
            </div>
            <div class="table_2_small_main">
                <div>
                    <span class="table_2_small_text_data">{{ $pay }}</span>
                    <span><i class="fa fa-money"></i>اجمالي المدفوعات</span>
                </div>
                <div>
                    <span class="table_2_small_text_data">{{ $monthlyEarning }}</span>
                    <span><i class="fa fa-money"></i>اجمالي الارباح الشهريه</span>
                </div>
            </div>
        </div>
        <!--------- TABLE_2 || END --------->


        <!--------- TABLE_2 || START --------->
        <div class="table_2">
            <div class="line_1">
                <div class="main_circle">
                    <div class="child_circle">
                        <span class="data_sub">{{ $subCount }}</span>
                    </div>
                    <div class="text_data">المشتركين <i class="fa fa-users"></i></div>
                </div>
                <div class="main_circle">
                    <div class="child_circle">
                        <span class="data_sub">{{ $result }}</span>
                    </div>
                    <div class="text_data">المشتركين الجدد <i class="fa fa-users"></i></div>
                </div>
            </div><!-----LINE || 1 ----->

            <div class="line_2">
                <div class="main_circle">
                    <div class="child_circle">
                        <span class="data_sub">{{ $pay }}</span>
                    </div>
                    <div class="text_data">اجمالي المدفوعات<i class="fa fa-money"></i></div>
                </div>
                <div class="main_circle">
                    <div class="child_circle">
                        <span class="data_sub">{{ $monthlyEarning }}</span>
                    </div>
                    <div class="text_data"> اجمالي الارباح الشهريه<i class="fa fa-money"></i></div>
                </div>
            </div><!-----LINE || 2 ----->
        </div>
        <!--------- TABLE_2 || END --------->

    <!--------- MAIN || START --------->
    <main>
        <div class="users">
            <button>
                <a href="/dashboard/{{ $admins->id }}"><i class="fa fa-users"></i></a>
            </button>
        </div><!---- Users ---->

        <div class="del_users">
            <button>
                <a href="/deleted-user/{{ $admins->id }}"><i class="fa fa-trash-o"></i></a>
            </button>
        </div><!---- Del || Users ---->

        <div class="users_data">
            <button>
                <a href="/data/{{$admins->id}}"><i class="fa fa-pie-chart"></i></a>
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
    <script src="../main.js/data-dash.js"></script>
    <script src="../main.js/main.js"></script>
    <!--------SCRIPT || SRCS || END---------->


</body>
</html>
