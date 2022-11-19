setInterval(function() {
  const xPost = Math.floor((Math.random() * 100 + 1) / 100 * 255);
  const yPost = Math.floor((Math.random() * 100 + 1) / 100 * 255);

  document.body.style.backgroundColor = 'rgb(' + xPost + ',' + yPost + ',100)';
  document.querySelector(".info").style.backgroundColor = 'rgb(' + xPost + ',' + yPost + ',100)';
}, 1000)




function getPilihanKomputer() {
  let comp = Math.random() * 100
  if (comp >= 0 && comp <= 33) return "batu";
  if (comp > 33 && comp <= 66) return "gunting";
  if (comp > 66 && comp <= 100) return "kertas";
}

function getHasil(comp, player) {
  if (player == comp) return "Seri";
  if (player == "kertas") return (comp == 'batu') ? "Kamu Menang" : "Kamu Kalah";
  if (player == "batu") return (comp == 'gunting') ? "Kamu Menang" : "Kamu Kalah";
  if (player == "gunting") return (comp == 'kertas') ? "Kamu Menang" : "Kamu Kalah";
}


function putar() {
  const imgKomputer = document.querySelector("#gambar-komputer");
  const gambar = ['batu', 'gunting', 'kertas']
  let i = 0;
  const waktuAwalPutar = new Date().getTime();
  setInterval(function() {
    if (new Date().getTime() - waktuAwalPutar > 9999) {
      clearInterval;
      return;
    }


    const teksPilKomputer = document.querySelector("#teksPilKomputer")
    teksPilKomputer.innerHTML = gambar[i].toLocaleUpperCase();

    imgKomputer.setAttribute('src', 'img/' + gambar[i++] + '.png')

    if (i == gambar.length) i = 0;
  }, 1000)
}


const ikon = document.querySelectorAll(".ikon img")
ikon.forEach(function(ico) {
  // console.log(ico);
  ico.addEventListener("click", function() {
    const pilihanKomputer = getPilihanKomputer();

    const pilihanPlayer = ico.id;
    const teksPilPlayer = document.querySelector("#teksPilPlayer");
    teksPilPlayer.innerHTML = pilihanPlayer.toLocaleUpperCase();

    const pScore = document.querySelector('#pScore');
    const kScore = document.querySelector('#kScore');


    putar();

    setTimeout(function() {
      const hasil = getHasil(pilihanKomputer, pilihanPlayer);
      const imgKomputer = document.querySelector("#gambar-komputer");
      imgKomputer.setAttribute('src', 'img/' + pilihanKomputer + '.png');

      const infoHasil = document.querySelector("#hasil");
      const teksPilKomputer = document.querySelector("#teksPilKomputer")

      infoHasil.innerHTML = hasil;
      teksPilKomputer.innerHTML = pilihanKomputer.toLocaleUpperCase();

      if (hasil == "Kamu Menang") {
        pScore.className = parseInt(pScore.className) + 1
        kScore.className = parseInt(kScore.className) - 1
        // if(parseInt(pScore.className) < 0){pScore.className = 0;}
        // if(parseInt(kScore.className) < 0){kScore.className = 0;}
        pScore.innerHTML = pScore.className;
        kScore.innerHTML = kScore.className;
        infoHasil.style.backgroundColor = "lightgreen";
      } else if (hasil == "Kamu Kalah") {
        pScore.className = parseInt(pScore.className) - 1
        kScore.className = parseInt(kScore.className) + 1
        // if(parseInt(pScore.className) < 0){pScore.className = 0;}
        // if(parseInt(kScore.className) < 0){kScore.className = 0;}
        pScore.innerHTML = pScore.className;
        kScore.innerHTML = kScore.className;
        infoHasil.style.backgroundColor = "red";
        infoHasil.style.color = "white";
      } else if (hasil == "Seri") {
        pScore.className = parseInt(pScore.className)
        kScore.className = parseInt(kScore.className)
      }

      // alert(pScore.className)

    }, 10000)


  })
})






// const pKertas = document.querySelector("#kertas");
// pKertas.addEventListener("click",function(){
//     const pilihanKomputer = getPilihanKomputer();
//     const pilihanPlayer = pKertas.id;
//     const hasil = getHasil(pilihanKomputer,pilihanPlayer);
//     // alert(pilihanKomputer);
//     // alert(hasil);

//     const imgKomputer = document.querySelector("#gambar-komputer");
//     imgKomputer.setAttribute('src','img/'+pilihanKomputer+'.png');
//     const infoHasil = document.querySelector("#hasil");
//     infoHasil.innerHTML = hasil;
// })


// const pBatu = document.querySelector("#batu");
// pBatu.addEventListener("click",function(){
//     const pilihanKomputer = getPilihanKomputer();
//     const pilihanPlayer = pBatu.id;
//     const hasil = getHasil(pilihanKomputer,pilihanPlayer);
//     // alert(pilihanKomputer);
//     // alert(hasil);

//     const imgKomputer = document.querySelector("#gambar-komputer");
//     imgKomputer.setAttribute('src','img/'+pilihanKomputer+'.png');
//     const infoHasil = document.querySelector("#hasil");
//     infoHasil.innerHTML = hasil;
// })


// const pGunting = document.querySelector("#gunting");
// pGunting.addEventListener("click",function(){
//     const pilihanKomputer = getPilihanKomputer();
//     const pilihanPlayer = pGunting.id;
//     const hasil = getHasil(pilihanKomputer,pilihanPlayer);
//     // alert(pilihanKomputer);
//     // alert(hasil);

//     const imgKomputer = document.querySelector("#gambar-komputer");
//     imgKomputer.setAttribute('src','img/'+pilihanKomputer+'.png');
//     const infoHasil = document.querySelector("#hasil");
//     infoHasil.innerHTML = hasil;
// })





