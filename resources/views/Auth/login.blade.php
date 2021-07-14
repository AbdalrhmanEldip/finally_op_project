
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN || Page</title>
    <!--------Tilte------------------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------Meta------------------->
    <link rel="stylesheet" href="main.css/login.css">
    <link rel="stylesheet" href='Global.css/font-awesome.min.css'>
    <link rel="stylesheet" href="Global.css/main.css">
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


    <!-----HEADER || START---->
    <header>
        <div class="logo">ادموزلا</div><!-----LOGO----->
        <div class = 'img_logo'></div>
    </header>
    <!-----HEADER || End---->

    <!-----CONTAINER || Start---->


    <form action="/login" method="post">
        {{csrf_field()}}

        
        
    <div class="container">
        <!-----LOGIN || DATA || Start----->



        <div class="login_data">
            <div class="login_data_content">
                <h1>تسجيل الدخول</h1>
                <div class="input_user_name">
                    <input type="text" name="admin_name" placeholder="اسم المستخدم">
                    <i class="fa fa-user"></i>
                </div>
                <!-----Input || User || Name----->
                <div class="input_password">
                    <input type="password" name="admin_pass" placeholder="كلمه السر">
                    <i class="fa fa-lock"></i>
                </div>
                <!-----Input || Password----->
                <button class="sumbit">تسجيل الدخول <i class="fa fa-angle-double-left"></i></button>
            </div>
            <!-----Login || Data  || Content----->
            </form>
        </div>

        <!-----LOGIN || DATA || End ----->

        <!-----side|| left || image || Start----->
        <div class="side_left_image"></div>
        <!-----side|| left || image || End----->
    </div>
    <!-----CONTAINER || End---->

    <!-----FOOTER || START---->
    <footer>
        <div class="reserve">
           <span>Copyright © Al Deeb Company 2021 All Rights Reserved</span>
           <i class="fa fa-level-up"></i>
        </div><!-----Reserve----->
    </footer>
    <!-----FOOTER || End---->
    <script src="../main.js/main.js"></script>
</body>
</html>
