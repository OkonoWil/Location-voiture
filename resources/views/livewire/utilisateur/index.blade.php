<div>

    @if ($isBtnCreateClicked)
    @include('livewire.utilisateur.create')
    @endif

    @if($isBtnEditClicked)
    @include('livewire.utilisateur.edit')
    @endif

    @if ($isBtnListClicked)
    @include('livewire.utilisateur.list')
    @endif

</div>
<script>
    window.addEventListener("showSuccessMessage", event=>{    
        console.log(event)
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: event.detail.Message || "Opération effectuée avec succès!",
            showConfirmButton: false,
            timer: 3000
        })

    })
    window.addEventListener("showConfirmMessage", event=>{  
        console.log(event)
        Swal.fire({
            title: event.detail.title,
            text: event.detail.Message,
            icon: event.detail.icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimez-le!',
            cancelButtonText: 'Annuler'
          }).then((result) => {
            if (result.isConfirmed) {
              @this.deleteUser(event.detail.data.user_id)
            }
          })

    })
</script>