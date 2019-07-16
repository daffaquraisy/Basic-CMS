{!! Form::model($teams, [
    'route' => $teams->exists ? ['teams.update',
    $teams->id] : 'teams.store',
    'method' => $teams->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="control-label">Name</label>
        {!! Form::text('name', null, ['class' =>
        'form-control', 'id' => 'name']) !!}
    </div>

    <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
        <label for="image" class="control-label">Link Image</label>
        {!! Form::text('image', null, ['class' =>
        'form-control', 'id' => 'image']) !!}
    </div>

    <div class="form-group{{ $errors->has('career_id') ? 'has-error' : '' }}">
        <label for="career_id" class="control-label">Career</label>
        {!! Form::text('career_id', null, ['class' =>
        'form-control', 'id' => 'career_id']) !!}
    </div>

    @push('scripts')
<script type="text/javascript">
    $('#cari').select2({
        placeholder: 'Cari...',
        ajax: {
            url: '/search/teams',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endpush

{!! Form::close() !!}