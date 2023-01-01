let editbtn = document.getElementById("editbtn");

let usernameInput = document.getElementById("username");
let passwordInput = document.getElementById("password");
let nicknameInput = document.getElementById("nickname");
let varss = [usernameInput,passwordInput,nicknameInput]


varss.forEach((el)=>{
    el.addEventListener("keydown",(e)=>{
        if(e.which == 13){
            daftarEvent();
        }
    })
})

editbtn.addEventListener("click",()=>{
    daftarEvent();
})



function daftarEvent(){
    let username = usernameInput.value;
    username = cekSpasikata(username);
    let password = passwordInput.value;
    password = cekSpasikata(password);
    let password2 = document.getElementById("current_password").textContent;
    password2 = cekSpasikata(password2);
    let nick_name = nicknameInput.value;
    for (let i = 0; i < nick_name.length; i++) {
        nick_name = nick_name.trim();
    }
    
    if(varss[0].value.length<=0){varss[0].focus()}
    else if(varss[1].value.length<=0){varss[1].focus()}
    else if(varss[2].value.length<=0){varss[2].focus()}


    let lanjut = false;
    if(username.length<=0){
        varss[0].focus();
        varss[0].value = "";
        notify.textContent = "Data kosong";
        showNotify();
    }
    else if(password.length<=0){
        varss[1].focus();
        varss[1].value = "";
        notify.textContent = "Data kosong";
        showNotify();
    }
    else if(nick_name.length<=0){
        varss[2].focus();
        varss[2].value = "";
        notify.textContent = "Data kosong";
        showNotify();
    }
    
    else {
        lanjut = true
    }

    if(lanjut == true){
        $.ajax({
            url: "edit.php",
            method : "post",
            dataType : 'json',
            data : 
                {
                    username : username,
                    password : password,
                    password2 : password2,
                    nick_name : nick_name,
                    profile_img : profile_img
                },
            success : (e)=>{
                // console.log(e);
                // console.log("AJAX OKE");
                notify.textContent = e;
                showNotify();
                if(e=="Berhasil"){
                    notify.textContent = "Data berhasil diubah";
                    showNotify();
                }
            },
            error: (e)=>{
                console.log(e);
            }
        })
        .done(()=>{
            showNotify();
        })
    }
}


// function showNotify(){
//     notify = document.getElementById("notify");
//     notify.style.right = '10px';
//     setTimeout(()=>{
//         notify.style.right='-500px';
//     },1000)
// }



let profiles = document.getElementsByName("profile");
let previewprofile = document.getElementById("preview-profile");
let profile_img = previewprofile.alt;

profiles.forEach(p => {
    p.addEventListener("click",()=>{
        imgSrc = "../img/pfp/pfp";
        profile_img = p.value;
        imgSrc+=profile_img+".png";
        previewprofile.src = imgSrc;
        imgSrc = "../img/pfp/pfp";
    })
});




let hapusbtn = document.getElementById("hapusbtn");
let userid = document.getElementById("user_id");
userid = userid.textContent
hapusbtn.onclick = ()=>{
    lanjut = confirm("Hapus akun?");
    if(lanjut==true){
        $.ajax({
            url:"hapus.php",
            method : "post",
            data : {
                delete : "true",
                userid : userid
            },
            dataType: 'json',
            success : (e)=>{
                console.log(e);
                if(e=="dihapus"){
                    console.log("ok");
                    window.location = "../";
                }
                else if(e=="gagal"){
                    console.log("gagalhapus");
                }
            },
            error : (e)=>{
                console.log(e);
                console.log("gagal");
            }
        })
    }
}



let showpassword = document.getElementById("showpassword");
let show = false;
showpassword.onclick = ()=>{
    if(show==false){
        passwordInput.type = "text";
        showpassword.src = "../img/eye.svg"
        show = true;
    }
    else if(show == true){
        passwordInput.type = "password";
        showpassword.src = "../img/eye-fill.svg"
        show = false;
    }
}