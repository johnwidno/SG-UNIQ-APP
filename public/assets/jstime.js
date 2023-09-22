setInterval(() => {
    let time = document.getElementById('current-time')
    let d= new Date();
    time.innerHTML='   '+d.toLocaleTimeString()+" - "+ d.toLocaleDateString();

}, 1000);



setInterval(() => {
    let time = document.getElementById('displayindeuxseconde')

    let d = new Date();

     time.style.display = 'none';


}, 500000);


const currentYear = '- SGUNIQ -'+new Date().getFullYear() ;


document.getElementById("copyright-year").textContent = currentYear;


setInterval(() => {
    let time = document.getElementById('displayerror')

    time.innerHTM="errror"
        time.style.display = 'none';


}, 5000);






document.getElementById('fichier').addEventListener('change', function () {
    const maxSize = 5 * 1024 * 1024; // 5 MB in bytes

    if (this.files.length > 0 && this.files[0].size > maxSize) {
        alert('File size exceeds the maximum allowed size of 5 MB.');
        this.value = ''; // Clear the file input
    }
});


function printTable() {

    const table = document.getElementById('tableId');
    const titrelibele = document.getElementById('titrelibele');

    if (table) {
      // Afficher uniquement la table lors de l'impression

      table.style.visibility = 'visible';
      titrelibele.style.visibility = 'visible';

      window.print();
    }
  }







