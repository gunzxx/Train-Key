let daftarbtn = document.getElementById("daftar");

let usernameInput = document.getElementById("username");
let passwordInput = document.getElementById("password");
let password2Input = document.getElementById("password2");
let nicknameInput = document.getElementById("nickname");
let varss = [usernameInput,passwordInput,password2Input,nicknameInput];


varss.forEach((el)=>{
    el.addEventListener("keydown",(e)=>{
        if(e.which == 13){
            let i = 0;
            daftarEvent();
        }
    })
})

daftarbtn.addEventListener("click",()=>{
    let i = 0;
    daftarEvent();
})



function daftarEvent(){
    let usernameInput = document.getElementById("username");
    let passwordInput = document.getElementById("password");
    let password2Input = document.getElementById("password2");
    let nicknameInput = document.getElementById("nickname");
    let varss = [usernameInput,passwordInput,password2Input,nicknameInput];

    let username = usernameInput.value;
    username = cekSpasikata(username);
    varss[0].value = username;
    let password = passwordInput.value;
    password = cekSpasikata(password);
    varss[1].value = password;
    let password2 = password2Input.value;
    password2 = cekSpasikata(password2);
    varss[2].value = password2;
    let nick_name = nicknameInput.value;
    for (let i = 0; i < nick_name.length; i++) {
        nick_name = nick_name.trim();
    }
    varss[3].value = nick_name;

    let vars2=[username, password, password2,nick_name];
    
    
    lanjut = false;
    
    // cekabjad = true;
    // vars2.forEach((v2)=>{
    //     sub = v2.split("");
    //     sub.forEach((su)=>{
    //         if(cekabjad == true){
    //             if(abjadstr.includes(su)){
    //                 cekabjad = true;
    //                 lanjut = false;
    //             }
    //             else if((abjadstr.includes(su))==false){
    //                 notify.textContent = "Hanya bisa abjad dan underscore";
    //                 showNotify();
    //                 varss[i].focus();
    //                 varss[i].value = "";
    //                 cekabjad = false;
    //                 lanjut = true;
    //             }
    //             console.log(i);
    //         }
    //         if(i<3){
    //             i++;
    //         }
    //         else if(i>=3){
    //             i = 0;
    //         }
    //     })
    // })

    
    if(lanjut == false){
        if(username.length<=0){
            varss[0].focus();
            varss[0].value = "";
            notify.textContent = "Username kosong";
            showNotify();
            lanjut=false;
        }
        else if(password.length<=0){
            varss[1].focus();
            varss[1].value = "";
            notify.textContent = "Password kosong";
            showNotify();
            lanjut=false;
        }
        else if(password2.length<=0){
            varss[2].focus();
            varss[2].value = "";
            notify.textContent = "Password kosong";
            showNotify();
            lanjut=false;
        }
        else if(nick_name.length<=0){
            varss[3].focus();
            varss[3].value = "";
            notify.textContent = "Nickname kosong";
            showNotify();
            lanjut=false;
        }
        else if(password != password2){
            lanjut=false;
            notify.textContent = "Password tidak sama";
            showNotify();
        }
        else if(password.length<3){
            lanjut=false;
            notify.textContent = "Password kurang dari 3";
            showNotify();
        }
        else{
            lanjut = true;
        }
        
        if(lanjut == true){
            $.ajax({
                url: "ajax/register.php",
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
                    console.log(e);;
                    notify.textContent = e;
                    console.log("AJAX OKE");
                    if(e=="Berhasil"){
                        alert("Register Berhasil")
                        window.location = "index.php";
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


}






let profiles = document.getElementsByName("profile");
let previewprofile = document.getElementById("preview-profile");
let profile_img = 1;


profiles.forEach(p => {
    p.addEventListener("click",()=>{
        imgSrc = "img/pfp/pfp";
        profile_img = p.value;
        imgSrc+=profile_img+".png";
        console.log(imgSrc);
        previewprofile.src = imgSrc;
        imgSrc = "img/pfp/pfp";
    })
});