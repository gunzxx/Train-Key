let userInput = document.getElementById('userInput');
const reset = document.getElementById('reset');
const countdown = document.getElementById('countdown');
const teksCase = document.getElementById('teksCase');
const abjadstr = abjad.join('');
let countTime = 10;
let kalimat = kamus.slice(0,10);
let kata = kalimat.join(" ");
let poin = 0;
let indeks = 0;
let keyInput = '';


userInput.addEventListener('keyup',mainkan,{once:true})

reset.addEventListener('click', resetTeks);

function getKata(){
    setTimeout(function(){
        shuffle(kamus);
        teksCase.innerHTML = '"'+kata.toLowerCase()+'"';
        console.log();
    },0)
}

getKata();




function resetTeks(){
    userInput.value="";
    keyInput=""
    getKata();
}

function mainkan(){
    countdown.innerHTML = countTime;
    const mundur = setInterval(function(){
        countTime -= 1;
        if (countTime <= 0 ){
            clearInterval(mundur);
            countTime = 0;
            userInput.hidden=true;
            reset.hidden=true;
            document.getElementById('teksCount').style.opacity=0;
            tampilPoin();
            tampilHighPoin();
        }
        countdown.innerHTML = countTime;
    },1000);
}



function tampilPoin(){
    document.getElementById('poinNow').value=poin;
    document.getElementById('poinNow').innerHTML=poin;
    document.getElementById('score').style.opacity=1;
}

function tampilHighPoin(){
    let poinNow = document.getElementById('poinNow');
    let highPoin = document.getElementById('highPoin');
    if(poinNow.value>highPoin.value){
        highPoin.innerHTML=poin;
    }
}






userInput.addEventListener('keydown',function(e){
    if(e){
        if(e.ctrlKey && e.which==65)
        {
            e.preventDefault();
        }
        else if (e.ctrlKey && e.which==67)
        {
            e.preventDefault();
        }
        else if (e.ctrlKey && e.which==86)
        {
            e.preventDefault();
        }
        else if (e.ctrlKey && e.which==88)
        {
            e.preventDefault();
        }
        else if (e.ctrlKey && e.which==89)
        {
            e.preventDefault();
        }
        else if (e.ctrlKey && e.which==90)
        {
            e.preventDefault();
        }
        else
        {
            if(abjadstr.includes(e.key)){
                keyInput+= e.key;
            }
        }
    }
    
    if (e.key =='Backspace' || e.keyCode == 8){
        if(keyInput.length>0){
            keyInput = keyInput.slice(0,-1)
        }
        else if(e.target.value == ""){
            keyInput="";
        }
    }
    
    console.log(keyInput);
    // console.log(e);
    
    if(e.keyCode==32 || e.keyCode==13){
        e.target.value="";
        if (keyInput == kalimat[indeks].toLowerCase()){
            // console.log('ok');
            poin+=kalimat[indeks].length;
            console.log(poin);
            indeks+=1;
            e.target.classList.remove("wrong")
            e.target.placeholder = "Benar";
            if(indeks>=kalimat.length){
                indeks=0;
                console.log('ok');
                shuffle(kamus);
                kata = kalimat.join(" ");
                kalimat = kamus.slice(0,10);
                teksCase.innerHTML = kata.toLowerCase();
            }
        }else{
            e.target.classList.add("wrong");
            e.target.placeholder = "Salah";
        }
        keyInput = '';
    }

})