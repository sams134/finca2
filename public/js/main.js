const table = document.querySelector("#colorsTable").addEventListener('click', (e) => {
    if (e.target.classList.contains('remove')){
         e.preventDefault();
         Swal.fire({
            title: 'Seguro que desea eliminar este color',
            text: "Este cambio no puede ser revertido",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo',
            cancelButtonText: 'No, cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              e.target.parentNode.submit();
            }
          })
    }
});

