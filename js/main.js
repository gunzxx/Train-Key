let indexkata = 0;
let indexhuruf = 0;
let basebenar = 0;


// abjadstr = abjad.join("");


let banyakhuruf = 0;
let poinbenar = 0;
let poinsalah = 0;
let poin = 0;



let userInput = document.getElementById('userInput')
userInput.addEventListener("focus",()=>{
    let classkata2 = ".kata"+indexkata;
    document.querySelector(classkata2).style.backgroundColor = '#8D9EFF';
    
})


userInput.addEventListener("keydown",(i)=>{
    countdown();
},{once:true})


document.getElementById("restart").addEventListener("click",(e)=>{
    resetTeks();
})


let jalanLagi;
function resetTeks(){
    let samplekata = document.querySelectorAll(".kata");
    if(typeof(mundur)=='undefined'){
        return true;
    }else if(typeof(mundur)!='undefined'){
        clearInterval(mundur);
    }
    
    shuffle(kamus);
    for(let i = 0;i<10;i++){
        samplekata[i].textContent = kamus[indexkamus].toLowerCase();
        indexkamus++;
    }

    samplekata.forEach(subkata => {
        subkata.style.backgroundColor = 'transparent';
    });

    document.querySelector('.timer').style.display='flex';
    
    let countTime = 60;
    document.getElementById('countdown').textContent = countTime;
    document.getElementById('userInput').value = "";
    userInput.hidden=false;

    indexkata=0;
    indexhuruf=0;

    banyakhuruf = 0;
    poinbenar = 0;
    poinsalah = 0;
    setPoin();

    
    // console.log(jalanLagi);
    if(jalanLagi==undefined){
        jalanLagi = true;
        userInput.addEventListener("keydown",(i)=>{
            countdown();
            jalanLagi = undefined;
        },{once:true})
    }
}



window.addEventListener('load',()=>{
    let sample = document.querySelectorAll(".kata");
    // console.log(sample);
    indexkamus = 0;
    for(let i = 0;i<10;i++){
        sample[i].textContent = kamus[indexkamus].toLowerCase();
        indexkamus++;
    }
})


userInput.addEventListener("keydown",(e)=>{
    let key = e.key;
    let inputValue = userInput.value;
    let result;
    
    let sample = document.querySelectorAll(".kata");

    let classkata = ".kata";
    classkata+=indexkata;
    let kata = sample[indexkata].textContent;

    if (e.ctrlKey) //cek CTRL
    {
        e.preventDefault();
    }
    if(e.which==32 || e.which==13) //cek enter dan spasi
    {
        e.preventDefault();

        basebenar = poinbenar;

        if(inputValue != kata.substring(0,kata.length)){
            document.querySelector(classkata).style.backgroundColor = '#F49D1A';
        }
        if(inputValue== kata.substring(0,kata.length)){
            document.querySelector(classkata).style.backgroundColor = '#4ee74e';
        }
        userInput.value="";
        inputValue = ""
        key="";
        result = inputValue+key;
        

        
        if(indexkata>=sample.length-1){
            // ajaxTeks();
            for(let i = 0;i<10;i++){
                sample[i].textContent = kamus[indexkamus].toLowerCase();
                sample[i].style.backgroundColor = 'transparent';
                indexkamus++;
            }
        }
        if (indexkata<=9){
            indexkata++;
        }
        if(indexkata>9){
            indexkata=0;
        }
        
        let classkata3 = ".kata";
        classkata3+=indexkata;
        document.querySelector(classkata3).style.backgroundColor = '#8D9EFF';
        indexhuruf=0;
    }

    
    else if(e.which==20) //cek capslock
    {
        e.preventDefault();
        key = ""
        result = inputValue+key;
    }


    else if (key =='Backspace' || e.which == 8){ //cek backspace
        key="";
        inputValue= inputValue.slice(0,-1); //menghapus 1 huruf dibelakang
        
        indexhuruf-=1;
        poinbenar-=1;
        if(poinbenar<=basebenar){poinbenar=basebenar};
        benar.textContent = poinbenar;

        result = inputValue;
        if(inputValue== kata.substring(0,indexhuruf)){
            document.querySelector(classkata).style.backgroundColor = '#4ee74e';
        }else if (inputValue!= kata.substring(0,indexhuruf)){
            document.querySelector(classkata).style.backgroundColor = 'red';
        }
        if(indexhuruf<=0){
            indexhuruf=0
        }
    }
    else if(abjadstr.includes(e.key)){
        result = inputValue+key;
        if(indexhuruf<kata.length){
            indexhuruf+=1;
        }else if (indexhuruf>=kata.length){
            e.preventDefault();
        }
        if (result == kata.substring(0,indexhuruf)){
            poinbenar+=1;
            poinsalah+=0;
            banyakhuruf+=1;
            setPoin();
            document.querySelector(classkata).style.backgroundColor = '#4ee74e';
        }else if(result!=kata.substring(0,indexhuruf)){
            poinbenar+=0;
            poinsalah+=1;
            banyakhuruf+=1;
            setPoin();
            document.querySelector(classkata).style.backgroundColor = 'red';
        }
    }
    else //cek tombol lain
    {
        e.preventDefault()
        key=""
        result = inputValue+key;
    }
})


window.addEventListener("load",function(){
    userInput.removeAttribute("disabled");
    userInput.placeholder = "Ketik disini...";
})



let profileimg = document.getElementById("profile");
let profilemenu = document.getElementById("profile-menu")
let tampil = true
profileimg.addEventListener("click",()=>{
    if(tampil == true){
        profileimg.style.transform = "rotate(360deg)";
        profilemenu.style.opacity = 1;
        profilemenu.style.display = 'flex';
        tampil = false;
    }else if(tampil == false){
        profileimg.style.transform = "rotate(0deg)";
        profilemenu.style.opacity = 0;
        profilemenu.style.display = 'none';
        tampil = true;
    }
})




let logoutbtn = document.getElementById("logoutbtn")
logoutbtn.addEventListener("click",()=>{
    let lanjut = confirm();
    if(lanjut == true){
        window.location = "logout.php";
    }
    else if(lanjut == false){
        // alert("GAGAL");
    }
})



let rank_body = document.getElementById("rank_body");
let showall = document.getElementById("showall");
let search = document.getElementById("search");


let hilang = "true";
showall.addEventListener("click",()=>{
    if(hilang == 'true'){
        $.ajax({
            url : "ajax/showall.php",
            method : 'post',
            data : {
                showall : 'true'
            },
            success : (e)=>{
                showall.textContent = "Show less";
                rank_body.innerHTML = e;
                search.value = "";
                search.focus();
            }
        })
        hilang = "false";
    }
    else if(hilang == "false"){
        $.ajax({
            url : "ajax/showall.php",
            method : 'post',
            data : {
                limit : 10
            },
            success : (e)=>{
                showall.textContent = "Show all"
                rank_body.innerHTML = e;
                search.value = "";
                search.focus();
            }
        })
        hilang = "true";
    }
})


search.onkeydown = (e)=>{
    let keyboard = e.key;
    let keyword = search.value;
    if(abjadstr.includes(e.key)){
        keyword = search.value+keyboard;
    }
    else if (e.which == 8){ //cek backspace
        keyboard="";
        keyword= keyword.slice(0,-1); //menghapus 1 huruf dibelakang
    }
    else{
        keyboard="";
        keyword = search.value+keyboard;
    }
    for (let i = 0; i < keyword.length; i++) {
        keyword = keyword.trim();
    }
    $.ajax({
        url : "ajax/search.php",
        method : 'post',
        data : {
            keyword : keyword
        },
        success : (e)=>{
            rank_body.innerHTML = e;
            showall.textContent = "Show less";
            hilang = "false";
            if(keyword<=0){
                search.value = "";
                search.focus();
            }
        }
    })
}