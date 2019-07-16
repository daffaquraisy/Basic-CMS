{!! Form::model($informations, [
    'route' => $informations->exists ? ['informations.update',
    $informations->id] : 'informations.store',
    'method' => $informations->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title" class="control-label">Title</label>
        {!! Form::text('title', null, ['class' =>
        'form-control', 'id' => 'title']) !!}
    </div>

    <div class="form-group{{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="description" class="control-label">Deskripsi</label>
        {!! Form::text('description', null, ['class' =>
        'form-control', 'id' => 'description']) !!}
    </div>

    <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
        <label for="image" class="control-label">Link Image</label>
        {!! Form::text('image', null, ['class' =>
        'form-control', 'id' => 'image']) !!}
    </div>

    {!! Form::close() !!}