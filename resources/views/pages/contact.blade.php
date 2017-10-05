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
          <div class="text-center">
            <p class="lead">We're ready to assist you get to your event.</p>
            <p class="lead">If you have questions about an event, kindly contact the event organizer. You can find their contact information on their event page.</p>
            <p class="lead">If you have any questions about TicketRoom or difficulty processing a payment, kindly fill the form below and give as much details as possible.</p>
          </div><br>
          <form action="{{ route('contact_mail') }}" method="post">
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
                      'placeholder' => 'Subject', 'maxlength' => '255')) }}
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-sm-6">
                      {{ Form::text('reference', null, array('class' => 'form-control',
                        'placeholder' => 'Ticket No -- optional', 'maxlength' => '255')) }}
                      </div>
                      <div class="col-sm-6">
                        {{ Form::text('organizer', null, array('class' => 'form-control',
                          'placeholder' => 'Organizer -- optional', 'maxlength' => '255')) }}
                        </div>
                      </div><br>
                  <div class="row">
                    <div class="col-sm-12">
                      {{ Form::textarea('message', null, array('class' => 'form-control', 'required' => '',
                        'placeholder' => 'Your Message')) }}
                      </div>
                    </div><br>
                    {{ Form::submit('Send', array('class' => 'btn btn-lg myBtn btn-block', 'style' => 'margin-top: 10px')) }}
                  </form>
                  </div>
                </div>
              </div>
            </section>
            <br>
          @endsection
