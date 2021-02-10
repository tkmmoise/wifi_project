<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-file-csv mr-1"></i>
        Upload csv file for reload Tickets
    </div>
    <div class="card-body">
        <form action="/admin" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror"
                        id="file">
                    <label class="custom-file-label" for="file">Choose file</label>
                </div>
                <div class="input-group-append">
                    <button type="submit" class="input-group-text">Upload</button>
                </div>
            </div>
            @error('file')

            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            <span class="invalid-feedback" role="alert">

            </span>
            @enderror
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <strong>{{session('error')}}</strong>
            </div>
            @endif
            @if (session('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}
            </div>
            @endif

        </form>
    </div>
</div>