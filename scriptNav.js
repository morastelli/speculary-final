//NAVBAR
const list = document.querySelectorAll('.list');
    function activeLink(){
        list.forEach((item) =>
        item.classList.remove('active'));
        this.classList.add('active');
    }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));

    function sair() {
        window.location.href = 'sair.html'
    }

    function irAdm() {
        window.location.href = 'loginAdmin.php'
    }

    function irSobre(){
        window.location.href = 'telaQuemSomos.html'
    }

    function irTermos(){
        window.location.href = 'telaTermos.html'
    }

    function irPrivacidade(){
        window.location.href = 'telaPrivacidade.html'
    }