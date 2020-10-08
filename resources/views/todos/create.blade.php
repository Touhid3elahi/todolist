@extends('layout.app')
    @section('content')
        <h3>Create Todo</h3>
        <form action="{{URL::to('todo')}}" method="post">
            @csrf
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Text</label>
                <input type="text" class="form-control" placeholder="text" name="text" required data-validation-required-message="Please enter your text.">
                <p class="help-block text-danger"></p>
            </div>
        </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>body</label>
                    <input type="text" class="form-control" placeholder="body" name="body" required data-validation-required-message="Please enter your body.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>due</label>
                <input type="text" class="form-control" placeholder="due" name="due" required data-validation-required-message="Please enter your due.">
                <p class="help-block text-danger"></p>
            </div>
        </div>
            <div id="success">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    @endsection