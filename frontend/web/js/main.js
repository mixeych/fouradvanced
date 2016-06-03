Avatar = {};
jQuery(document).ready(function($){
     $(".avatar-widget input").change(function(){
        readURL(this);
        Avatar.files = this.files;
        $(".avatar-widget .submit").show();
    });
    
    $(".avatar-widget .submit").click(function(e){
        e.preventDefault();
        var data = new FormData();
        if(!Avatar.files){
            return false;
        }

        $.each(Avatar.files, function(key, value){
            data.append( key, value );
        });
        $.ajax({
            url: '/my-account/',
            type: 'POST',
            cache: false,
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res){
                if(res.success){
                    $(".avatar-widget .submit").hide();
                    $(".avatar-widget .congirm").show();
                }
            }
        });      
    });
   
});


function readURL(input) {

    if (input.files && input.files[0]) {
        Avatar.reader = new FileReader();
        Avatar.reader.onload = function (e) {
            Avatar.src = e.target.result;
            $('.avatar-widget-your-avatar').attr('src', Avatar.src);
        }
        
        Avatar.reader.readAsDataURL(input.files[0]);
    }
}

