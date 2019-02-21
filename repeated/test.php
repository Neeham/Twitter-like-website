<?PHP session_start(); ?>
<!DOCTYPE html>
 <html>
      <head>
           <title>Webslesson Tutorial | Autocomplete textbox using jQuery, PHP and MySQL</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <style>
           ul{
                background-color:#eee;
                cursor:pointer;
           }
           li{
                padding:12px;
           }
           </style>
      </head>
      <body>
           <div class="container" style="width:300px;">
                <input type="text" name="userfield" id="userfield" class="form-control" placeholder="Search User" />
                <div id="userList"></div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#userfield').keyup(function(){
           var query = $(this).val();
           if(query != '') {
                $.ajax({
                     url:"../assets/query",
                     method:"POST",
                     data:{searchUser:query},
                     success:function(data) {
                          $('#userList').fadeIn();
                          $('#userList').html(data);
                     }
                });
           }
      });
      $(document).on('click', 'li', function(){
           $('#userfield').val($(this).text());
           var user = document.getElementById("userfield").value;
           window.location.href = '<?PHP echo 'https://www.haxstar.com/pages/profile?Login='.$_SESSION["session_user"].'&Lookup='?>'+user;
           $('#userList').fadeOut();
      });
 });
 </script>
