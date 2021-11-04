@livewireStyles
@livewireScripts

<livewire:requests-component />
<livewire:modal-component />

<script>
    window.addEventListener('show-modal', event => {
        
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
        myModal.show();
    })
</script>