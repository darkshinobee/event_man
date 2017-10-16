@component('mail::message')
  <img src="{{ asset('images/logos/t_logo.png') }}" alt="TicketRoom Logo"><br>
  <img src="https://api.qrserver.com/v1/create-qr-code/?data={{$bn}}&amp;size=100x100"/><br>
# Some Title That I Came Up With

The body of your message. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

Thanks,<br>
{{ config('app.name') }}

@endcomponent
