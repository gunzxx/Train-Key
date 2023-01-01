let chatarea = document.querySelector(".chat-area");
let tekskomen = document.getElementById('tekskomen');
let kirimkomen = document.getElementById('kirimkomen');



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
            chatarea.innerHTML = data;
            let rowcount = document.querySelector('.rowcount');
            if(rowcount.textContent < limit){
                let lastcomment = document.getElementById('last-comment')
                lastcomment.style.display = 'flex';
                hideLoading();
            }
            else if(rowcount.textContent == limit){
                showLoading();
            }
        },
        error: function(data){
            console.log(data);
        }
    })

},1000)



window.addEventListener('load',function(){
    limit = 20;
    setTimeout(function(){
        document.body.style.overflow = 'visible';
        document.getElementById("train-container").style.opacity = 0;
    },1000)

    setTimeout(function(){
        document.getElementById("train-container").style.display = 'none';
        // document.getElementById("loading-container").style.height = '200px';
        // document.getElementById("loading-container").style.backgroundColor = 'transparent';
    },1500)
},{once:true})

