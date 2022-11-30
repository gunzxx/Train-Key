function shuffle(array) {
    let temp = [];
    for (var i = array.length; i > 0; i--) {
        var j = Math.floor(Math.random() * i);
        temp.push(array[j])
    }
    return temp;
}


function cekSpasi(kata){
    let sample = kata.split("");
    let dump = [];
    sample.forEach(e => {
        if(e==" "){
            dump.push("")
        }
        else{
            dump.push(e);
        }
    });
    return dump.join("");
}


function checkKey(){
    userInput.addEventListener("keydown",(e)=>{
        let key = e.key;
        let inputValue = userInput.value;
        let result;
        if (e.ctrlKey){
            e.preventDefault();
        }
        else if(e.which==32 || e.which==13){
            e.preventDefault();
            userInput.value="";
            inputValue = ""
            key="";
            result = inputValue+key;
        }
        else if(e.which==20){
            key = ""
            result = inputValue+key;
        }
        else if (key =='Backspace' || e.which == 8){
            key="";
            inputValue= inputValue.slice(0,-1);
            result = inputValue+key;
        }
        else if(abjadstr.includes(e.key)){
            result = inputValue+key;
        }
        else{
            e.preventDefault()
            key=""
            result = inputValue+key;
        }
    })
}


function cekKata(kata){
    let sample1 = kata.split("");
    let dump2 = [];
    sample1.forEach(e => {
        if(abjadstr.includes(e)){
            dump2.push(e)
        }
        else{
            dump2.push("");
        }
    });
    return dump2.join("");
}



function cekindexhuruf(){
    if(indexhuruf==kata.length-1){
        console.log("Lebih");
    }
}


let mundur;
let countTime = 10;
function countdown(){
    document.getElementById('countdown').innerHTML = countTime;
    mundur = setInterval(function(){
        countTime -= 1;
        if (countTime <= 0 ){
            countTime = 0;
            userInput.hidden=true;
            document.querySelector('.timer').style.display='none';
            clearInterval(mundur);

            let id = document.getElementById("user_id").textContent;

            let highpoin = document.getElementById("high_poin").textContent;
            if(poin>highpoin){
                let highpoin_text = document.getElementById("high_poin");
                
                $.ajax({
                    url: "https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/ajax/update.php",
                    data:
                        {
                            update:'true',
                            id:id,
                            highpoin:poin
                        },
                        dataType: 'json',
                    method:'post',
                    success: function(e){
                        highpoin_text.textContent = e.high_poin;
                        console.log(e.high_poin);
                        console.log("ajax oke");
                    },
                    error:function(e){
                        console.log(e);
                        console.log(arguments);
                        console.log("gagal");
                    }
                });
            }
            if(poin<=highpoin){
                console.log("Poin kecil");
            }
        }
        document.getElementById('countdown').innerHTML = countTime;
    },1000)
}


function setPoin(){
    let huruf = document.getElementById("huruf");
    let benar = document.getElementById("benar");
    let salah = document.getElementById("salah");
    let wpm = document.getElementById("poin");

    huruf.innerHTML=banyakhuruf;
    benar.innerHTML=poinbenar;
    salah.innerHTML=poinsalah;
    poin = poinbenar-poinsalah;
    wpm.innerHTML=poin;
}