<div>

    @if ($isBtnCreateClicked)
    @include('livewire.voiture.create')
    @endif

    @if($isBtnEditClicked)
    @include('livewire.voiture.edit')
    @endif

    @if ($isBtnListClicked)
    @include('livewire.voiture.list')
    @endif

</div>
<script>
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
</script>