let poinNow = document.getElementById('poinNow');


countdown.addEventListener('click', async () => {
    // const resp = await fetch('http://localhost/08%20Projek/index2.php', {
    //   method: 'POST',
    //   headers: {'Content-Type': 'application/json'},
    //   body: JSON.stringify({
    //     value: countdown.textContent,
    //   }),
    // });

    // // if the server sends a response, then it will be alerted here
    // const json = await resp.json();
    // alert('Server sent response: "' + json.response + '"');

    // const poin = document.querySelector('.container .point').textContent
    ;(async () => {
    await fetch('127.0.0.1:5500', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({poinNow })
    })
    })()
});