
<div class="container">
    <form enctype="multipart/form-data" method="post" action="/profile">
    {{ csrf_field() }}

    <div class="row">
        <div class="row"><h1>Add New Post :</h1></div>
        <div class="row">
            <label for="name" class="col-md-2 col-form-label text-md-end">Post name</label>

            <div class="col-md-10">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <label for="caption" class="col-md-2 col-form-label text-md-end">Post Caption</label>

            <div class="col-md-10">
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 col-form-label" for="image">Post Image</label>
            <input class="form-control-file" id='image' name='image' type="file">
            @error('image')
                
                <strong>{{ $message }}</strong>

            @enderror
        </div>
        <div class='row pt-3'>
            <button type='submit' style='max-width:200px' class="btn btn-primary ">Submit Post</button>
        </div>
        

    </div>
    </form>
</div>
