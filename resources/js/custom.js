$(document).ready(function(){ //view All button click for following
    $('#viewAllFollowing').on('touchstart click', function() {
        $('#myFollowingModal').modal();
        $.ajax({
            type:'POST',
            url:'/assets/query',
            data:{viewAllFollowing:1},
            success:function(data){
                $('#displayFollowingList').html(data);
            }
        });
    });
});

$(document).ready(function() { //View All button click for follower
    $('#viewAllFollower').on('touchstart click', function(){
        $('#myFollowerModal').modal();
        $.ajax({
            type:'POST',
            url:'/assets/query',
            data:{viewAllFollower:1},
            success:function(data){
                $('#displayFollowerList').html(data);
            }
        });
    });
});

$(document).ready(function() { //Choose file button to upload profile picture
 $image_crop = $('#imageToCrop').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle'
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#imageUpload').on('change', function() {
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event) {
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"/assets/query",
        type: "POST",
        data:{"cropAndUpload": response},
        success:function(data) {
          $('#uploadimageModal').modal('hide');
          location.reload();
        }
      });
    })
  });
});

//Ad blocker detection
$(document).ready(function() {
    if(adblock)
        $("#adBlock").show();
});
