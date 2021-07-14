<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Add || Admine || Form</title>
    <!--------Title-------------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------Meta-------------->
    <link rel="stylesheet" href="main.css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href='Global.css/font-awesome.min.css'>
    <!--------Links-------------->
</head>
<body>


 <form class ="append_form main_append_form col-8" method="post" action="/saveAdminData">
    <h1> Append Admins </h1>
    {{ csrf_field() }}
     <input type="text" name="admin_name" placeholder="Name">
     <input type="password" id="pass" name="admin_password" placeholder="Password">
     <input type="text" name="logo" placeholder="Logo">
     <select class="form-select form-select-sm" name="selectRole" aria-label=".form-select-sm example">
        <option value="0">0</option>
        <option value="1">1</option>
    </select>
     <input type="submit" value="Add">
     <span class="close">X</span>
 </form>

@foreach ($admins as $admin)
 <form class ="append_form_2 append_form  col-8" method="post" action="/update-admin-data/{{$admin->id}}">
    @csrf
     <input type="text" name="admin_name_change" value="{{ $admin->admin_name }}" placeholder="Name">
     <input type="text" id="pass" name="admin_password_change" value="{{ $admin->ptp }}" placeholder="Password">
     <input type="text" id="logo" name="admin_logo_change" value="{{ $admin->logo }}" placeholder="Logo Name">
     <input type="submit" value="Add">
     <span class="close">X</span>
 </form>
@endforeach

 <div class="container-fluid  d-flex align-items-center back_image" style = "height:100vh;">
    <div class="container" style = "height:600px; overflow:auto">
   <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <a class="navbar-brand text-light font-weight-bold" href="#">Main Dash</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <form class="form-inline my-2 my-lg-0" method="post" action="/admin-search">
                    @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchBox" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
   </nav>
    <div class="parent">
        <div class="responsive-table">

            <table class="table table-dark table-hover  table-striped">
                <thead>
                    <tr style = "cursor: pointer;">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Logo</th>
                        <th scope="col"><a href="/admins-pdf-details" target="_blank" class="fa fa-print"></a></th>
                        <th scope="col"><i class="fa fa-plus text-success"></i></th>
                        <th><a href="#" onclick="confirmDelete();" class="fa fa-trash-o text-danger"></a></th>
                        <th><a href="/" class="fa fa-arrow-left"></a></th>



                    </tr>
                </thead>


            @foreach ($admins as $admin)

                <tbody style = "cursor: pointer;">
                    <tr>
                        <th scope="row">{{ $admin->id }}</th>
                        <td>{{ $admin->admin_name }}
                            @if($admin->active == 1)
                                <span class = "active_admine"></span>
                            @else

                            @endif
                        </td>
                        <td >{{ $admin->ptp }}</td>
                        <td >{{ $admin->logo }}</td>
                        <td><a href="/delete-admin/{{$admin->id}}" onclick="return confirm('هل تريد حذفهذا الادمن مع بياناته ؟')" class="fa fa-trash-o text-danger"></a></td>
                        <td><i class="fa fa-repeat"></i></td>
                        <td><a href="/admin-pdf-details-id/{{ $admin->id }}" target="" class="fa fa fa-print"></a></td>
                        <td>
                          <form method="post" action="/admin-activation/{{ $admin->id }}" class ="expire_form">
                            {{ csrf_field() }}
                              <select name="activate" id="" class ="select_actives_controlls">
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                              </select>
                              <button type="submit">Save</button>
                          </form>
                        </td>
                    </tr>
                </tbody>

            @endforeach
            </table>
        </div>

    </div>
   </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>



    <script>
        document.querySelectorAll('.close').forEach(s => {
                s.addEventListener('click',() => {
                document.querySelector('.append_form').classList.remove('active_form');
                document.querySelectorAll('.append_form_2').forEach(s => {
                    s.classList.remove('active_form');
                });
            })
        });

        document.querySelector('.fa-plus').addEventListener('click',() => {
            document.querySelector('.append_form').classList.add('active_form');
        })

        document.querySelectorAll('.fa-repeat').forEach((s,index) => {
                s.addEventListener('click',() => {
                document.querySelectorAll('.append_form_2')[index].classList.add('active_form');
            })
        });
    </script>

    <script type="text/javascript">

      function confirmDelete() {
        var c = confirm("هل تريد الحذف بشكل نهائي ؟؟");
        if (c) {
          location.href = '/unActive-all-admins';
          }
          else {

          }
      }
      
     
    </script>




</body>
</html>
