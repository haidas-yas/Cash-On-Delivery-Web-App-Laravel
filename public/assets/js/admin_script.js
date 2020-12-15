$(document).ready(function () {
    //check current pwd
    $("#current_password").keyup(function () {
            var current_password = $("#current_password").val();
            //alert(current_password);
            $.ajax({
                type:'post',
                url:'/check-current-pwd',
                data:{current_password:current_password},
                success:function (resp) {
                    if (resp=='false'){
                        $("#chkCurrentPwd").html("<font color=red>Current Password is incorrect !</font>");
                    }else if (resp=='true'){
                        $("#chkCurrentPwd").html("<font color=green>Current Password is correct !</font>");
                    }

                },error:function () {
                        alert("Error");
                }
            })
    });

});
