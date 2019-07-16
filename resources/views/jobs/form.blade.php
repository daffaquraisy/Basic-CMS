{!! Form::model($jobs, [
    'route' => $jobs->exists ? ['jobs.update',
    $jobs->id] : 'jobs.store',
    'method' => $jobs->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group{{ $errors->has('career') ? 'has-error' : '' }}">
        <label for="career" class="control-label">Career</label>
        {!! Form::text('career', null, ['class' =>
        'form-control', 'id' => 'career']) !!}
    </div>

{!! Form::close() !!}