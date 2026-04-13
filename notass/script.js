const estrelas = document.querySelectorAll('#seletor-estrelas .estrela');
const inputNota = document.getElementById('input-nota');

estrelas.forEach((estrela, index) => {
    estrela.addEventListener('mouseover', () => {
        resetarEstrelas();
        for (let i = 0; i <= index; i++) {
            estrelas[i].classList.add('hover');
        }
    });

    estrela.addEventListener('mouseout', () => {
        resetarEstrelas();
        marcarEstrelas(inputNota.value);
    });

    estrela.addEventListener('click', () => {
        inputNota.value = index + 1;
        marcarEstrelas(inputNota.value);
    });
});

function resetarEstrelas() {
    estrelas.forEach(e => e.classList.remove('hover', 'selecionada'));
}

function marcarEstrelas(valor) {
    for (let i = 0; i < valor; i++) {
        estrelas[i].classList.add('selecionada');
    }
}
