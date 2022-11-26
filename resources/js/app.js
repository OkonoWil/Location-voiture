import './bootstrap';
import Swal from 'sweetalert2'


    window.addEventListener("showSuccessMessage", event=>{   
        console.log(event)    
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: event.detail.Message || "Opération effectuée avec succès!",
            showConfirmButton: false,
            timer: 4000
        })

    })
