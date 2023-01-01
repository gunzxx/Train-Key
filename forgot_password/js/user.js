let sendbtn = document.getElementById("sendbtn");
let usernameInput = document.getElementById("username");
let passwordInput = document.getElementById("password");
let formusername = document.getElementById("form-username");
let formpassword = document.getElementById("form-password");

sendbtn.addEventListener("click",()=>{
    ajaxPassword();
})

passwordInput.addEventListener("keydown",(e)=>{
    if(e.which == 13){
        ajaxPassword();
    }
})


function ajaxPassword(){
    let username = usernameInput.value;
    let password = passwordInput.value;
    username = cekSpasikata(username);
    password = cekSpasikata(password);
    if(username.length > 0 && password.length >0){
        $.ajax({
            url : "ajax/password.php",
            method : "post",
            data : {
                cekpassword : "oke",
                username : username,
                password : password
            },
            dataType : "json",
            success : (e)=>{
                notify.textContent = e;
                if(e=="lanjut"){
                    window.location = "reset_password.php";
                }
                showNotify();
                passwordInput.value = "";
            }
        })
    }
}


usernameInput.addEventListener("keydown",(e)=>{
    let username = usernameInput.value;
    username = cekSpasikata(username);
    if(e.which == 13){
        ajaxUser();
    }
})



function ajaxUser(){
    let username = usernameInput.value;
    $.ajax({
        url : "ajax/user.php",
        method : 'post',
        data : {
            cekusername : 'true',
            username : username
        },
        dataType : "json",
        success : (e)=>{
            console.log("AJAX OKE");
            notify.textContent = e;
            if(e=="Data ditemukan"){
                sendbtn.style.display = "flex";
                formpassword.style.display = "flex";
                formusername.style.display = "none";
                passwordInput.focus();
            }
            else if (e=="Data tidak ditemukan")
            {
                // showNotify();
                showNotify();
            }
        },
        error:(e)=>{
            console.log(e);
        }
    })
}





function showNotify(){
    notify = document.getElementById("notify");
    notify.style.right = '10px';
    setTimeout(()=>{
        notify.style.right='-500px';
    },1000)
}
