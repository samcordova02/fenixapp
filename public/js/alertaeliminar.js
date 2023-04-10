$('.show-alert-delete-box').click(function(event){
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: "¿Estas seguro que deseas eliminar este registro?",
        text: "Esta accion es irreversible.",
        icon: "warning",
        type: "warning",
        buttons: ["Cancelar","Si, Eliminar"],
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});