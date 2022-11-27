userInput.addEventListener("keydown",(i)=>{
    countdown();
},{once:true})

userInput.addEventListener("keydown",(e)=>{
    let sample = document.querySelectorAll(".kata");
    let classkata = ".kata";
    classkata+=indexkata;
    let kata = sample[indexkata].textContent;
    // let huruf = kata[indexhuruf];
    // console.log(kata);
    

    let key = e.key;
    let inputValue = userInput.value;
    let result;
    if (e.ctrlKey){ //cek CTRL
        e.preventDefault();
    }
    else if(e.which==32 || e.which==13){ //cek enter dan spasi
        e.preventDefault();
        console.log(inputValue.length,kata.length);
        if(inputValue.length!=kata.length){
            document.querySelector(classkata).style.backgroundColor = 'yellow';
        }
        userInput.value="";
        inputValue = ""
        key="";
        result = inputValue+key;
        

        
        indexkata+=1;
        
        if(indexkata>=sample.length){
            ajaxTeks();
        }
        
        let classkata3 = ".kata";
        classkata3+=indexkata;
        document.querySelector(classkata3).style.backgroundColor = '#aaa';
        indexhuruf=0;
    }

    
    else if(e.which==20){ //cek capslock
        key = ""
        result = inputValue+key;
    }


    else if (key =='Backspace' || e.which == 8){ //cek backspace
        key="";
        inputValue= inputValue.slice(0,-1); //menghapus 1 huruf dibelakang
        indexhuruf-=1;
        result = inputValue;
        if(inputValue== kata.substring(0,indexhuruf)){
            document.querySelector(classkata).style.backgroundColor = 'green';
        }else{
            document.querySelector(classkata).style.backgroundColor = 'red';
        }
        if(indexhuruf<=0){
            indexhuruf=0
        }
    }
    else if(abjadstr.includes(e.key)){
        result = inputValue+key;
        if(indexhuruf<kata.length){
            indexhuruf+=1;
        }else if (indexhuruf>=kata.length){
            e.preventDefault();
            indexhuruf=indexhuruf;
        }
        if (result == kata.substring(0,indexhuruf)){
            poinbenar+=1;
            poinsalah+=0;
            banyakhuruf+=1;
            setPoin();
            document.querySelector(classkata).style.backgroundColor = 'green';
        }else if(result!=kata.substring(0,indexhuruf)){
            poinbenar+=0;
            poinsalah+=1;
            banyakhuruf+=1;
            setPoin();
            document.querySelector(classkata).style.backgroundColor = 'red';
        }
    }
    else{ //cek tombol lain
        e.preventDefault()
        key=""
        result = inputValue+key;
        if (result == kata.substring(0,indexhuruf)){
            document.querySelector(classkata).style.backgroundColor = 'green';
        }else if(result!=kata.substring(0,indexhuruf)){
            document.querySelector(classkata).style.backgroundColor = 'red';
        }
    }


    console.log("index huruf"+indexhuruf);
    console.log("index kata"+indexkata);
    console.log("class kata"+classkata);
})