@extends('layouts.front_end_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12 card border-0 min-vh-100">
                <div class="card-body bg-white rounded p-4">
                    <h3 class="mb-4 text-dark">Profile</h3>

                    <div class="container">
                        <div id="content">
                            <ul id="tabs" class="nav mb-3" data-tabs="tabs">
                                <li class="me-3">
                                    <a href="#red" class="btn btn-light border-end" data-toggle="tab">Red</a>
                                </li>
                                <li class="me-3">
                                    <a href="#orange" class="btn btn-light border-end" data-toggle="tab">Orange</a>
                                </li>
                                <li class="me-3">
                                    <a href="#yellow" class="btn btn-light border-end" data-toggle="tab">Yellow</a>
                                </li>
                                <li class="me-3">
                                    <a href="#green" class="btn btn-light border-end" data-toggle="tab">Green</a>
                                </li>
                                <li class="me-3">
                                    <a href="#blue" class="btn btn-light border-end" data-toggle="tab">Blue</a>
                                </li>
                            </ul>
                            <div id="my-tab-content" class="tab-content">
                                <div class="tab-pane bg-white p-4 border border-1 rounded active" id="red">
                                    <h1>Red</h1>
                                    <p>red red red red red red</p>
                                </div>
                                <div class="tab-pane bg-white p-4 border border-1 rounded" id="orange">
                                    <h1>Orange</h1>
                                    <p>orange orange orange orange orange</p>
                                </div>
                                <div class="tab-pane bg-white p-4 border border-1 rounded" id="yellow">
                                    <h1>Yellow</h1>
                                    <p>yellow yellow yellow yellow yellow</p>
                                </div>
                                <div class="tab-pane bg-white p-4 border border-1 rounded" id="green">
                                    <h1>Green</h1>
                                    <p>green green green green green</p>
                                </div>
                                <div class="tab-pane bg-white p-4 border border-1 rounded" id="blue">
                                    <h1>Blue</h1>
                                    <p>blue blue blue blue blue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
