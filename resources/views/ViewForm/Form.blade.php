@extends('ViewForm.Layouts.Master')

@section('title')
    URL Shortener
@stop

@section('content')
    <div class="card w-75">
        <div class="card-header text-center">
            <h5>Insert You URL in field</h5>
        </div>
        <div class="card-body p-5">
            <form action="" id="shortener">
                <div class="input-group mb-3">
                    <input type="text" name="source" class="form-control" placeholder="Paste a link to shorten it" aria-label="Paste a link to shorten it" aria-describedby="shortenURL">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="shortenURL">SHORTEN</button>
                        <button class="btn btn-outline-secondary copyShorten" type="button">COPY</button> 
                    </div>
                </div>
                <div class="shortenDetails">
                </div>
            </form>
        </div>
    </div>
@stop