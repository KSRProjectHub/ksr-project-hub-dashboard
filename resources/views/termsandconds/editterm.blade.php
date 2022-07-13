@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('userterms.index') }}">Terms and Conditions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('V')}}{{ $term->version }}</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>
<div class="container mb-3">
    <form action="{{ route('userterms.update', $term->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-control border-1" id="floatingText" type="text" name="title" placeholder="Title" value="{{ $term->title }}">
            </div>
            <div class="col-6">
                <input class="form-control border-1" id="floatingText" type="text" name="version" placeholder="version" value="{{ $term->version }}" readonly>
            </div>
        </div>

        <!--<div name="editor" class="mb-3" id="editor"></div>-->
        <p>
            <textarea class="form-control" name="editor" id="editor" value="">{!! $term->editor !!}</textarea>
        </p>
        
        
        <input type="submit" value="submit" name="Submit" class="btn btn-success uppercase">
        <input type="reset" value="reset" name="reset" class="btn btn-outline-secondary uppercase">
        <a type="button" value="cancel" href="{{ route('userterms.index') }}" name="cancel" class="btn btn-outline-secondary uppercase">cancel</a>

    </form> 
</div>

<script>
    class MyUploadAdapter {
                constructor( loader ) {
                    this.loader = loader;
                }
            
                upload() {
                    return this.loader.file
                        .then( file => new Promise( ( resolve, reject ) => {
                            this._initRequest();
                            this._initListeners( resolve, reject, file );
                            this._sendRequest( file );
                        } ) );
                }
            
                abort() {
                    if ( this.xhr ) {
                        this.xhr.abort();
                    }
                }
            
                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();
            
                    xhr.open( 'POST', "{{ route('upload', ['_token' => csrf_token() ])}}", true );
                    xhr.responseType = 'json';
                }
            
                _initListeners( resolve, reject, file ) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;
            
                    xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                    xhr.addEventListener( 'abort', () => reject() );
                    xhr.addEventListener( 'load', () => {
                        const response = xhr.response;
            
                        if ( !response || response.error ) {
                            return reject( response && response.error ? response.error.message : genericErrorText );
                        }
            
                        resolve( response );
                    } );
            
                    if ( xhr.upload ) {
                        xhr.upload.addEventListener( 'progress', evt => {
                            if ( evt.lengthComputable ) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        } );
                    }
                }
            
                _sendRequest( file ) {
                    const data = new FormData();
                    data.append( 'upload', file );
                    this.xhr.send( data );
                }
            }
            
            function MyCustomUploadAdapterPlugin( editor ) {
                editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                    return new MyUploadAdapter( loader );
                };
            }
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            //extraPlugins: [ MyCustomUploadAdapterPlugin ],
            removePlugins: ['Title'],
            placeholder: '',
            language: {
            textPartLanguage: [
                { title: 'Arabic', languageCode: 'ar' },
                { title: 'French', languageCode: 'fr' },
                { title: 'Hebrew', languageCode: 'he' },
                { title: 'Sinhala', languageCode: 'si' }
            ]}    
        } )
        .then( editor => {
            window.editor = editor;

            
            
            
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: rpakdcr3kx85-cghbwrj2o9eg' );
            console.error( error );
        } );
</script>
@endsection