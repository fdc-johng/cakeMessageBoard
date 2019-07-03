$(document).ready(function(){


	$('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#aboutPage').on('click', function(){
    	$("#about").show();
    	$("#newMessage").hide();
    	$("#createMessage").hide();
    	$(".nm-page").removeAttr('class');
    	$(".ab-page").attr('class', 'active');
    });

    $('#newMessagePage').on('click', function(){
     	$("#newMessage").css({ 'visibility' : 'visible'});
    	$("#about").hide();
    	$("#createMessage").hide();
    	$("#newMessage").show();
    });

    $('#createNewMessage').on('click', function(){
     	$("#createMessage").css({ 'visibility' : 'visible'});
    	$("#about").hide();
    	$("#createMessage").show();
    	$("#newMessage").hide();
    });

    $('#sendMessage').on('click', function(){
    	$("#about").hide();
    	$("#createMessage").hide();
    	$("#newMessage").show();
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#previewImage').attr('data', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#UserImage").change(function() {
      readURL(this);
    });
})