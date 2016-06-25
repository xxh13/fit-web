/**
 * Created by XXH on 2015/11/13.
 */
//function Check(){
//    var email = document.getElementById('email').value;
//    var password = document.getElementById('password').value;
//
//    var xmlhttp;
//    if(window.XMLHttpRequest){
//        xmlhttp = new XMLHttpRequest();
//    }else{
//        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//
//    xmlhttp.onreadystatechange=function(){
//        if(xmlhttp.readyState==4 && xmlhttp.status==200){
//            if(xmlhttp.responseText != 'success'){
//                document.getElementById('error-log').innerHTML = xmlhttp.responseText;
//                return false;
//            }
//        }
//    }
//    xmlhttp.open('GET','/auth/loginValid?email='+email+"&"+"password="+password,true);
//    xmlhttp.setRequestHeader('X-CSRF-Token', csrf_token());
//    xmlhttp.send();
//    return true;
//}

function Check(){
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var str="";
    if(email==""){
        str+=" 邮箱";
    }
    if(password==""){
        str+=" 密码";
    }
    if(str!="") {
        str+="  不能为空！";
        //alert(str);
        sweetAlert(str, "", "error");
        return false;
    }
    return true;
}


