@extends('main')
@section('title', 'Contact Us')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">What's On Your Mind?</h1>
    </div>
  </section>

  <section class="section-page-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          {!! Form::open([]) !!}
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-6">
              {{ Form::text('first_name', null, array('class' => 'form-control', 'required' => '',
                'placeholder' => 'First Name', 'maxlength' => '255')) }}
              </div>
              <div class="col-sm-6">
                {{ Form::text('last_name', null, array('class' => 'form-control', 'required' => '',
                  'placeholder' => 'Last Name', 'maxlength' => '255')) }}
                </div>
              </div><br>
              <div class="row">
                <div class="col-sm-12">
                  {{ Form::text('email', null, array('class' => 'form-control', 'required' => '',
                    'placeholder' => 'Email', 'maxlength' => '255')) }}
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-sm-12">
                    {{ Form::text('subject', null, array('class' => 'form-control', 'required' => '',
                      'placeholder' => 'Keywords that describe your problem', 'maxlength' => '255')) }}
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-sm-12">
                      {{ Form::textarea('message', null, array('class' => 'form-control', 'required' => '',
                        'placeholder' => 'Your Message', 'maxlength' => '255')) }}
                      </div>
                    </div><br>
                    {{ Form::submit('Send', array('class' => 'btn btn-lg myBtn btn-block', 'style' => 'margin-top: 10px')) }}
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </section>
            <br>
          @endsection
