@section('plugins.Sweetalert2', true)

@section('js')
<script>
    function confirmDelete(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed || result.value == true) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
    }
</script>
@endsection