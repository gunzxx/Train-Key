const countdown = document.getElementById('countdown');
let masukan = document.querySelector('#masukan');
let waktu = 3;
let jalan = true;

// masukan.addEventListener("keyup",function(){
//     jalan = true;
// });

function mainkan(){
    countdown.innerHTML = waktu;
    const mundur = setInterval(function(){
        waktu -= 1;
        if (waktu <= 0 ){
            clearInterval(mundur);
            waktu = 0;
        }
        countdown.innerHTML = waktu;
    },1000);
}

if(jalan == true){
    // mainkan();
    alert('ok');
}
function play(src){
    if (src.value.length>0){
        jalan = true;
    }
}












// ///////////////////



// const countdown = document.getElementById('countdown');
// let masukan = document.querySelector('input#masukan');
// let waktu = 13;
// let jalan = false;
let teks = 'ada';

masukan.addEventListener('keyup',function(){
    masukan.classList.add('active');
})



baru = document.querySelector('input#masukan.active')
// baru.addEventListener('keyup',function(){console.log('ok')})
masukan.addEventListener('change',function(){
    countdown.innerHTML = waktu;
    const mundur = setInterval(function(){
        waktu -= 1;
        if (waktu <= 0 ){
            clearInterval(mundur);
            waktu = 0;
        }
        countdown.innerHTML = waktu;
    },1000);
    document.body.onkeyup = function(e){
        if(e.keyCode == 32 || e.keyCode == 13){
            if(masukan.value == teks){
                alert('ok')
            }
        }
    }
})

function mainkan(){
    countdown.innerHTML = waktu;
    const mundur = setInterval(function(){
        waktu -= 1;
        if (waktu <= 0 ){
            clearInterval(mundur);
            waktu = 0;
        }
        countdown.innerHTML = waktu;
    },1000);
}

if(jalan== true){
    alert('ok')
}
