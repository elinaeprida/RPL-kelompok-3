$(document).ready(function(e){

    let $uploadfile = $('#register .upload-profile-image input[type="file"]');

    $uploadfile.change(function(){
        readURL(this);
    });

    $("#reg-form").submit(function(event){
        let $password = $("#password");
        let $confirm = $("#confirm_password");
        let $error = $("#confirm_error");

        if($password.val() === $confirm.val()){
            return true;
        }
        else{
            $error.text("Password did not match");
            event.preventDefault();
        }
    });
});

function readURL(input){
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            $("#register .upload-profile-image .img").attr('src', e.target.result); //img class dari foto
            $("#register .upload-profile-image .camera-icon").css({display:"none"});
        }

        reader.readAsDataURL(input.files[0]);
    }
}