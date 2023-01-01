function showLoading(){
    document.getElementById("loading-container").style.opacity = 1;
    // setTimeout(function(){
    //     document.getElementById("loading-container").style.opacity = 0;
    // },700)
}
function hideLoading(){
    document.getElementById("loading-container").style.opacity = 0;
}



// let r,g=0,b=0;

const chattext = document.querySelectorAll(".chat-text");
chattext.forEach(function(cc){
    r = Math.floor(Math.random()*255);
    g = Math.floor(Math.random()*255);
    b = Math.floor(Math.random()*255);
    
    if(r<120){r+=120;}
    if(g<120){g+=120;}
    if(b<120){b+=120;}
    console.log(r,g,b);

    cc.style.backgroundColor = "rgb("+r+","+g+","+b+")"
})



function showNotify(){
    notify = document.getElementById("notify");
    notify.style.right = 0;
    setTimeout(()=>{
        notify.style.right='-500px';
    },1000)
}


function ajaxKomen(){
    let limit = document.querySelectorAll('.komen-container').length;
    if($(window).scrollTop()+$(window).height() >= ($(document).height())){
        limit+=20;
    }
    let tekskomen = document.getElementById('tekskomen').value;
    for (let i = 0; i < tekskomen.length; i++) {
        tekskomen = tekskomen.trim();
    }
    
    if(tekskomen.length<=0){
        komen = document.getElementById("tekskomen");
        komen.value = "";
        notify = document.getElementById("notify");
        notify.textContent = "Komen kosong";
        showNotify();
    }

    if(tekskomen.length>0){
        $.ajax({
            url:"ajax/insertkomen.php",
            method:'post',
            data:{
                komen : 'true',
                tekskomen: tekskomen,
                limit : limit
            },
            success : function(data){
                chatarea.innerHTML = data
            },
            error: function(data){
                console.log(data);
            }
        })
    }
}