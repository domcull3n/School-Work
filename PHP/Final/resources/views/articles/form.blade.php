
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('html_content', 'HTML Content:') !!}
    {!! Form::textarea('html_snippet', null, ['class' => 'mceEditor']) !!}
</div>

<div class="form-group">
    {!! Form::label('allPages', 'All Pages:') !!}
    {!! Form::hidden('all_pages', 0) !!}
    {!! Form::checkbox('all_pages', 1) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

<script type="text/javascript">
    tinyMCE.init({
        selector: "textarea.mceEditor"
    });
</script>

