setInterval(() => {
    let time = document.getElementById('current-time')
    let d= new Date();
    time.innerHTML='   '+d.toLocaleTimeString()+" - "+ d.toLocaleDateString();

}, 1000);



setInterval(() => {
    let time = document.getElementById('displayindeuxseconde')

    let d = new Date();

     time.style.display = 'none';


}, 1500);


const currentYear = '- SGUNIQ -'+new Date().getFullYear() ;


document.getElementById("copyright-year").textContent = currentYear;

