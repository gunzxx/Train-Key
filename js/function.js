abjad = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

function shuffle(array) {
    let temp = [];
    for (var i = array.length; i > 0; i--) {
        var j = Math.floor(Math.random() * array.length);
        temp.push(array[j])
    }
    return temp;
}


function cekSpasi(array){
    let kata2 = '';
    let array2 = [];
    array.forEach((kata)=>{
        let sample = kata.split("");
        let dump = [];
        sample.forEach(e => {
            if(e==" "){
                index = sample.indexOf(e);
                sample.splice(index,sample.length);
            }
            else{
                dump.push(e);
            }
        });
        kata2 = sample.join("");
        array2.push(kata2);
    })
    return array2;
}


function cekSpasikata(kata){
    dump=kata.split("");
    for(i=0;i<dump.length;i++){
        kata = kata.replace(" ", '')
    }
    return kata;
}



function cekHuruf(array){
    let kata2 ='';
    let array2 = [];
    array.forEach((kata)=>{
        let sample1 = kata.split("");
        let dump2 = [];
        sample1.forEach(e => {
            if(abjad.includes(e)){
                dump2.push(e)
            }
            else{
                dump2.push("");
            }
        });
        kata2 = dump2.join("");
        array2.push(kata2)
    })
    return array2;
}


function cekHurufkata(katas){
    let kata2 ='';
    let sample = katas.split("");
    let dump2 = [];
    sample.forEach(e => {
        if(abjad.includes(e)){
            dump2.push(e)
        }
        else{
            dump2.push("");
        }
    });
    kata2 = dump2.join("");
    return kata2;
}



countTime = 60;
function countdown(){
    countTime = 60;
    document.getElementById('countdown').textContent = countTime;
    mundur = setInterval(function(){
        countTime -= 1;
        if (countTime <= 0 ){
            countTime = 0;
            userInput.hidden=true;
            clearInterval(mundur);

            let user_id = document.getElementById("user_id").textContent;

            let highpoin = document.getElementById("high_poin").textContent;
            if(poin>highpoin){
                let highpoin_text = document.getElementById("high_poin");

                let rank = document.getElementById("rank_body");
                // console.log(rank);
                
                $.ajax({
                    url: "ajax/update.php",
                    data:
                        {
                            update: 'true',
                            user_id: user_id,
                            highpoin: poin
                        },
                    dataType: 'json',
                    method:'post',
                    success: function(e){
                        // console.log(e);
                        highpoin_text.textContent = e.high_poin;
                    },
                    error:function(e){
                        console.log(e);
                        console.log(arguments);
                        console.log("ajax1 gagal");
                    }
                });

                
                $.ajax({
                    url: "ajax/rank.php",
                    method:'post',
                    data :{
                        limit:'10'
                    },
                    success : (e)=>{
                        rank.innerHTML = e;
                        console.log("ajax2 oke");
                    },
                    error : (e)=>{
                        // console.log(e);
                        console.log("ajax2 gagal");
                    }
                })
            }
            if(poin<=highpoin){
                console.log("Poin kecil");
            }
        }
        document.getElementById('countdown').textContent = countTime;
        // lanjut = false;
    },1000)
}


function setPoin(){
    let huruf = document.getElementById("huruf");
    let benar = document.getElementById("benar");
    let salah = document.getElementById("salah");
    let wpm = document.getElementById("poin");

    huruf.textContent=banyakhuruf;
    benar.textContent=poinbenar;
    salah.textContent=poinsalah;
    poin = poinbenar-poinsalah;
    wpm.textContent=poin;
}





function showNotify(){
    notify = document.getElementById("notify");
    notify.style.right = 0;
    setTimeout(()=>{
        notify.style.right='-500px';
    },1000)
}