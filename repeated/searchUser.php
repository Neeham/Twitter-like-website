<?PHP session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/header.php';
?>

           <style>
           ul{
                background-color:#eee;
                cursor:pointer;
           }
           li{
                padding:12px;
           }
           </style>

           <div style="width:300px;">
                <input type="text" name="userfields" id="userfields" class="form-control" placeholder="Search User" />
                <div id="userList"></div>
           </div>

 <script>
 $(document).ready(function(){
      $('#userfields').keyup(function(){
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
           $('#userfields').val($(this).text());
           var user = document.getElementById("userfields").value;
           window.location.href = '<?PHP echo 'https://www.haxstar.com/pages/profile?Login='.$_SESSION["session_user"].'&Lookup='?>'+user;
           $('#userList').fadeOut();
      });
 });
 </script>
