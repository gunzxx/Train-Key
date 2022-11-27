// let r,g=0,b=0;


const chattext = document.querySelectorAll(".chat-text");
chattext.forEach(function(cc){
    r = Math.floor(Math.random()*255);
    g = Math.floor(Math.random()*255);
    b = Math.floor(Math.random()*255);
    
    if(r<120){r+=120;}
    if(g<120){g+=120;}
    if(b<120){b+=120;}
    console.log(r,g,b);

    cc.style.backgroundColor = "rgb("+r+","+g+","+b+")"
})

