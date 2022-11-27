let dump = [];
abjadstr = abjad.join("");


let sample = document.querySelectorAll(".kata");
sample.forEach((e)=>{
    let kata = cekSpasi(e.textContent);
    console.log(kata);
})


let userInput = document.getElementById('userInput')
userInput.addEventListener("focus",()=>{
    // console.log("ok");
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
})