destroy = function(e) {
    let url = e.getAttribute('url')
    let token = e.getAttribute('token')
    Swal.fire({
        icon: 'question',
        title: 'Desea continuar?',
        text: 'El registro será eliminada',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Aceptar'
    }).then((res)=>{
        if(res.isConfirmed){
            const request = new XMLHttpRequest();
            request.open('delete', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);
            request.onload = () => {
                if (request.status==200) {
                    e.closest('tr').remove()
                    Swal.fire({
                        icon: 'success',
                        text: 'Eliminado Correctamente'
                    })
                }
            }
            request.onerror = err => rejects(err);
            request.send();
        }
    })
}