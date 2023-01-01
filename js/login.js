let loginbtn = document.getElementById("login");
let usernameInput = document.getElementById("username");
let passwordInput = document.getElementById("password");

loginbtn.addEventListener("click",()=>{
    loginVerification();
})


usernameInput.addEventListener("keydown",(e)=>{
    if(e.which == 13){
        loginVerification();
    }
})

passwordInput.addEventListener("keydown",(e)=>{
    if(e.which == 13){
        loginVerification();
    }
})


function loginVerification(){
    let username = usernameInput.value;
    let password = passwordInput.value;
    notify = document.getElementById("notify");
    
    $.ajax({
        url: "ajax/login.php",
        method : "post",
        data:
            {
                remember : checked,
                username : username,
                password : password
            },
        dataType : "json",
        success:(e)=>{
            console.log("AJAX OKE");
            if(e == "berhasil"){
                window.location = "index.php";
            }
            if(e == "Username kosong"){
                usernameInput.focus();
            }
            if(e == "Password kosong"){
                passwordInput.focus();
            }
            notify.textContent = e;
        },
        error:(e)=>{
            console.log(e);
        },
    })
    .done((e)=>{
        showNotify();
    })
}


function showNotify(){
    notify = document.getElementById("notify");
    notify.style.right = 0;
    setTimeout(()=>{
        notify.style.right='-500px';
    },1000)
}



let showpassword = document.getElementById("showpassword");
let show = false;
showpassword.onclick = ()=>{
    if(show==false){
        passwordInput.type = "text";
        showpassword.src = "img/eye.svg"
        show = true;
    }
    else if(show == true){
        passwordInput.type = "password";
        showpassword.src = "img/eye-fill.svg"
        show = false;
    }
}


let remember = document.getElementById("remember")
let checked = "false";
remember.onclick = ()=>{
    if(remember.checked == true){
        checked = "true";
    }
    else if(remember.checked == false){
        checked = "false";
    }
}