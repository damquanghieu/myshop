$(document).ready(function() {
    $('.confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).parents('.form-delete').attr('action');
        const parent = $(this).parents('td');
        const token = jQuery('meta[name="csrf-token"]').attr('content');

        console.log(parent);
        swal({
            method: "DELETE",
            title: 'Are you sure?',
            text: 'Delete this menu will destroy all it children!',
            type: "warning",
            //confirmButtonClass: 'btn-danger waves-effect waves-light',
            showCancelButton: true,
            confirmButtonColor: "#d9534f",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
        }).then(function(value) {
            if (value) {
                window.location.href = url;
                parent.html("<form class='form-btn-delete' action =" + url + " method ='post'> < /form>")
                $('.form-btn-delete').append('<input name="_method" type="hidden" value="delete">');
                $('.form-btn-delete').append('<input name="_method" type="hidden" value="delete">');
                $('.form-btn-delete').append('<input name="_token" type="hidden" value="' + token + '">');
                $('.form-btn-delete').submit();
            }
        });
    });
});