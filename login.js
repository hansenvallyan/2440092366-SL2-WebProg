$("#kembali").click(function(){
    location.href="./welcome.php"
})


document.getElementById("kembali").style.cursor="pointer";

var btn = document.getElementById("login");
if(btn.enabled){
    document.getElementById("login").style.cursor="pointer";
}


