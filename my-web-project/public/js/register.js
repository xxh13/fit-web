/**
 * Created by XXH on 2015/11/13.
 */

function Check(){
    var email=document.getElementById("email").value;
    var username=document.getElementById("username").value;
    var pre_password=document.getElementById("password").value;
    var post_password=document.getElementById("post-password").value;
    //var validationCode=document.getElementById("validationCode").value;

    var str="";
    if(email==""){
        str+="邮箱";
    }
    if(username==""){
        str+=" 昵称";
    }
    if(pre_password==""){
        str+=" 密码";
    }
    if(post_password==""){
        str+=" 确认密码";
    }
    //if(validationCode==""){
    //    str+=" 验证码";
    //}
    if(str!="") {
        str+="  不能为空！";
        //alert(str);
        sweetAlert(str, "", "error");
        return false;
    }

    if(pre_password!=post_password){
        //alert("前后两次输入的密码不一致！");
        sweetAlert("前后两次输入的密码不一致！", "", "error");
        return false;
    }

    var psw = document.getElementById("password").value;
    if (psw.length<6){
        //alert('密码长度不能小于6位！');
        sweetAlert("密码长度不能小于6位！", "", "error");
        return false;
    }
    return true;
}
