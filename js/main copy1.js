let dump = [];
abjadstr = abjad.join("");


let sample = document.querySelectorAll(".kata");
sample.forEach((e)=>{
    let kata = cekSpasi(e.textContent);
    console.log(kata);
})


let userInput = document.getElementById('userInput')
userInput.addEventListener("keydown",(e)=>{
    let key = e.key;
    let inputValue = userInput.value;
    let result;
    if(e){
        if(e.ctrlKey && e.which==65)
        {
            e.preventDefault();
            key="";
        }
        else if (e.ctrlKey){
            e.preventDefault();
            key="";
        }
        else if (e.ctrlKey && e.which==67)
        {
            e.preventDefault();
            key="";
        }
        else if (e.ctrlKey && e.which==86)
        {
            e.preventDefault();
            key="";
        }
        else if (e.ctrlKey && e.which==88)
        {
            e.preventDefault();
            key="";
        }
        else if (e.ctrlKey && e.which==89)
        {
            e.preventDefault();
            key="";
        }
        else if (e.ctrlKey && e.which==90)
        {
            e.preventDefault();
            key="";
        }
        // else
        // {
        //     if(abjadstr.includes(e.key)){
        //         result = inputValue+e.key;
        //     }
        // }
    }
    if (key =='Backspace' || e.which == 8){
        key="";
        inputValue= inputValue.slice(0,-1);
        result = inputValue+key;
    }
    else if(e.which==32 || e.which==13){
        e.preventDefault();
        userInput.value="";
        inputValue = ""
        key="";
        result = inputValue+key;
    }
    else if(e.which==18){
        e.preventDefault();
        key=""
    }
    
    // result = inputValue+key;
    if(abjadstr.includes(e.key)){
        result = inputValue+key;
    }
    console.log(result);
    console.log(result.length);
})