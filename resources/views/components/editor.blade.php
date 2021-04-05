@props(['field'])

@section('plugins.Editor', true)

@section('js')
<script>
    ClassicEditor.create( document.querySelector( '{{ $field }}' ), {
        toolbar: {
            items: [
                'heading',
                '|',
                'alignment',
                'bold',
                'italic',
                'underline',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'horizontalLine',
                'undo',
                'redo',
                'removeFormat'
            ]
        },
        language: 'en',
        licenseKey: '',
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( error );
    } );
</script>
@endsection