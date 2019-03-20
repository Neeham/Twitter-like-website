$(document).ready(function(){
    $("#viewAllFollowing").click(function(){
        $("#myFollowingModal").modal();
        $.ajax({
            type:'POST',
            url:'/assets/query',
            data:{viewAllFollowing:1},
            success:function(data){
                $("#displayFollowingList").html(data); //the data is displayed in id=display_details
            }
        });
    });
});

$(document).ready(function(){
    $("#viewAllFollower").click(function(){
        $("#myFollowerModal").modal();
        $.ajax({
            type:'POST',
            url:'/assets/query',
            data:{viewAllFollower:1},
            success:function(data){
                $("#displayFollowerList").html(data); //the data is displayed in id=display_details
            }
        });
    });
});

$(document).ready(function(){

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

  $('#imageUpload').on('change', function(){
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

  $('.crop_image').click(function(event){
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
