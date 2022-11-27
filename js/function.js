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
        console.log(result);
        console.log(result.length);
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
            clearInterval(mundur);
            countTime = 0;
            userInput.hidden=true;
            restart.hidden=true;
            document.getElementById('teksCount').style.opacity=0;

            // console.log("end");
            let id = document.getElementById("id").textContent;
            console.log(id);
            $.ajax({
                url: "ajax/update.php",
                data:
                    {
                        upload:'true',
                        id:id,
                        highpoin:poin
                    },
                method:'post',
                dataType:'json',
                success: function(e){
                    console.log(e);
                    console.log("oke");
                },
                error:function(e){
                    console.log(e);
                    console.log(arguments);
                    console.log("gagal");
                }
            });
        }
        document.getElementById('countdown').innerHTML = countTime;
    },1000)
}



function ajaxTeks(){
    const sampleTeksContainer = document.getElementById('sampleTeksContainer');
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if ( xhr.readyState == 4 && xhr.status == 200 ){
            sampleTeksContainer.innerHTML = xhr.responseText;
        }
    }
    // eksekusi ajax
    xhr.open('GET','ajax/teks.php' ,true);
    xhr.send();

    indexkata=0;
    indexhuruf=0;
}


function setPoin(){
    const huruf = document.getElementById("huruf");
    const benar = document.getElementById("benar");
    const salah = document.getElementById("salah");
    const wpm = document.getElementById("poin");


    huruf.innerHTML=banyakhuruf;
    benar.innerHTML=poinbenar;
    salah.innerHTML=poinsalah;
    poin = poinbenar-poinsalah;
    wpm.innerHTML=poinbenar-poinsalah;
}