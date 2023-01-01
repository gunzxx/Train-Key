let passwordInput = document.getElementById("password");
let password2Input = document.getElementById("password2");
let simpanbtn = document.getElementById("simpanbtn");


passwordInput.addEventListener("keydown",(e)=>{
    if(e.which == 13){
        gantiPassword();
    }
})

password2Input.addEventListener("keydown",(e)=>{
    if(e.which == 13){
        gantiPassword();
    }
})

simpanbtn.addEventListener("click",()=>{
    gantiPassword();
})

function gantiPassword(){
    password = passwordInput.value;
    password = cekSpasikata(password);
    console.log(password);
    password2 = password2Input.value;
    password2 = cekSpasikata(password2)
    console.log(password2);
    
    let lanjut = "false";

    if(password.length<=0){
        passwordInput.focus();
        notify.textContent = "Password kosong";
        lanjut = "false";
        showNotify();
    }
    else if(password2.length<=0){
        password2Input.focus();
        notify.textContent = "Password kosong";
        lanjut = "false";
        showNotify();
    }
    else if(password.length<5){
        passwordInput.focus();
        notify.textContent = "Password kurang dari 5";
        lanjut = "false";
        showNotify();
    }
    else if(password2.length<5){
        password2Input.focus();
        notify.textContent = "Password kurang dari 5";
        lanjut = "false";
        showNotify();
    }
    else if(password != password2){
        console.log("NO");
        notify.textContent = "Password tidak sama";
        showNotify();
        lanjut = "false";
    }
    else if(password == password2 && password.length > 4 && password2.length > 4){
        lanjut = "true";
    }
    
    if(lanjut === "true"){
        $.ajax({
            url : "ajax/reset.php",
            method : "post",
            data : {
                reset_password : "true",
                password : password2Input.value
            },
            dataType : "json",
            success : (e)=>{
                if(e=="berhasil"){
                    alert("Password berhasil diubah");
                    window.location = "../";
                }
                else{
                    notify.textContent = e;
                    showNotify();
                    passwordInput.focus();
                }
            },
            error:(e)=>{
                console.log(e);
            }
        })
    }
}