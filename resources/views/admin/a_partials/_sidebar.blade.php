<div class="slidebar">
  <div class="logo">
    <a href="#"></a>
  </div>
  <ul>
    <li class="{{ Request::is('admin/dashboard') ? "active" : "" }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="{{ Request::is('admin/event_request') ? "active" : "" }}"><a href="{{ route('event_request') }}">Requests</a></li>
    <li class="{{ Request::is('admin/search_event_page') ? "active" : "" }}"><a href="{{ route('search_event_page') }}">Search Event</a></li>
    <li class="{{ Request::is('admin/search_organizer_page') ? "active" : "" }}"><a href="{{ route('search_organizer_page') }}">Search Organizer</a></li>
  </ul>
</div>
