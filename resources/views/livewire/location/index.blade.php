<div>

  @if ($isBtnCreateClicked)
  @include('livewire.location.create')
  @endif

  @if($isBtnEditClicked)
  @include('livewire.location.edit')
  @endif

  @if ($isBtnListClicked)
  @include('livewire.location.list')
  @endif

</div>
<script>
  window.addEventListener("showSuccessDesMessage", event=>{ 
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
        })
            Toast.fire({
                icon: 'success',
                title: event.detail.Message || "Opération effectuée avec succès!",
            })      
  
    })

    window.addEventListener("showSuccessMessage", event=>{ 
          Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: event.detail.Message || "Opération effectuée avec succès!",
              showConfirmButton: false,
              timer: 3000
          })
  
      })
      window.addEventListener("showConfirmMessage", event=>{
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
      window.addEventListener("showConfirmCreateMessage", event=>{
          Swal.fire({
              title: event.detail.title,
              text: event.detail.Message,
              icon: event.detail.icon,
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Oui, créez-le!',
              cancelButtonText: 'Annuler'
            }).then((result) => {
              if (result.isConfirmed) {
                @this.createLocation(event.detail.data.data)
              }
            })
  
      })
      window.addEventListener("showPictureMessage", event=>{  
          Swal.fire({
              title: event.detail.title,
              text: event.detail.text,
              imageUrl: event.detail.imageUrl,
              imageWidth: 400,
              imageHeight: 200,
              imageAlt: event.detail.imageAlt,
          })
      })

      window.addEventListener("showErrorsMessage", event=>{  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: event.detail.Message,
        })
      })
</script>