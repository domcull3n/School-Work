<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    {!! Form::hidden('active_state', 0) !!}
    {!! Form::checkbox('active_state', 1) !!}
</div>

<div class="form-group">
    {!! Form::label('css_content', 'CSS Content:') !!}
    {!! Form::textarea('css', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>