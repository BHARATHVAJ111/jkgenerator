<!-- resources/views/form.blade.php -->

@extends('layouts.layouts')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
{{-- @dd($Closure->id) --}}
                <div class="card-body">
                    <form method="POST" action="{{ route('submit.form', ['id' => $Closure->id, 'asset_number' => $Closure->asset_number]) }}">
                        @csrf

                        <div class="form-group">
                            <label for="input_field">Closing Date</label>
                            <input type="date" class="form-control @error('input_field') is-invalid @enderror" id="input_field" name="input_field">
                            @error('input_field')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="textarea">Remarks</label>
                            <textarea class="form-control @error('textarea') is-invalid @enderror" id="textarea" name="textarea"></textarea>
                            @error('textarea')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

