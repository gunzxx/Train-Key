let chatarea = document.querySelector(".chat-area");
let tekskomen = document.getElementById('tekskomen');
let kirimkomen = document.getElementById('kirimkomen');


function ajaxKomen(){
    $.ajax({
        url:"ajax/insertkomen.php",
        method:'post',
        data:{
            komen : 'true',
            tekskomen: tekskomen.value

        },
        success : function(data){
            chatarea.innerHTML = data
        },
        error: function(data){
            console.log(data);
        }
    })
}


tekskomen.addEventListener('keydown',function(e){
    if(e.which==13){
        ajaxKomen();
        tekskomen.value="";
    }
})


kirimkomen.addEventListener('click',function(e){
    console.log(e);
    ajaxKomen();
    tekskomen.value="";
})



let chat = setInterval(function(){
    let limit = document.querySelectorAll('.komen-container').length;
    if($(window).scrollTop()+$(window).height() >= ($(document).height() - 50)){
        limit+=20;
    }

    $.ajax({
        url:"ajax/chat.php",
        method:'post',
        data:{
            limit :limit
        },
        success : function(data){
            chatarea.innerHTML = data
            let rowcount = document.getElementById('rowcount');
            if(rowcount.textContent < limit){
                let lastcomment = document.getElementById('last-comment')
                lastcomment.style.display = 'flex';
            }
            if(rowcount.textContent = limit){
                showLoading();
            }
            if(rowcount.textContent > limit){
                let lastcomment = document.getElementById('last-comment')
                lastcomment.style.display = 'flex';
            }
        },
        error: function(data){
            console.log(data);
        }
    })
},1000)



window.addEventListener('load',function(){
    setTimeout(function(){
        document.body.style.overflow = 'visible';
        document.getElementById("loading-container").style.opacity = 0;
    },1000)

    setTimeout(function(){
        document.getElementById("loading-container").style.position = 'relative';
        document.getElementById("loading-container").style.height = '100px';
        document.getElementById("loading-container").style.backgroundColor = '#fff';
    },1500)
})



function showLoading(){
    document.getElementById("loading-container").style.opacity = 1;
    setTimeout(function(){
        document.getElementById("loading-container").style.opacity = 0;
    },700)
}
