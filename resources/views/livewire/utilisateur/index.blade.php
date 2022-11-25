<div>

    @if ($isBtnAddClicked)
    @include('livewire.utilisateur.create')
    @else
    @include('livewire.utilisateur.list')
    @endif
</div>