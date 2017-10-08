@extends('admin.master')
@section('title', 'Search Organizer')
@section('content')
  <style>
    [v-cloak] { display:none; }
  </style>
  <div class="container" id="admin_organizer">
    <div class="row" style="height:753px; overflow-x: scroll;">
      <div class="col-sm-10 col-sm-offset-1">
        <h2 class="text-center">SEARCH ORGANIZER</h2><br>
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" placeholder="Search Organizer"
          v-model="search_query" @keyup.enter="search()">
          <span class="input-group-btn">
            <button class="btn myBtn" :click="search">Go!</button>
          </span>
        </div><br>
        <div class="" v-if="search_query.length" v-cloak>


        <table class="table table-striped table-hover">
          <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </thead>
          <tbody>
            <tr v-for="result in search_results">
              <td><a :href="'/admin/organizer_events/'+result.id">@{{ result.first_name }}</a></td>
              <td>@{{ result.last_name }}</td>
              <td>@{{ result.email }}</td>
              <td v-if="search_loader">@{{ search_loader }}</td>
              <td v-if="errors">@{{ search_loader }}</td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src="/js/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js" charset="utf-8"></script>
<script>
var v_admin_organizer = new Vue({
  el: '#admin_organizer',
  data: {
    search_query: '',
    search_results: [],
    errors: '',
    search_loader: ''
  },
  watch: {
    search_query: function () {
      this.search_results = null
      this.errors = ""
      if (this.search_query.length >= 1) {
        this.search()
      }
    }
  },
  methods: {
    search: _.debounce(function() {
      var obj = this;
      obj.search_loader = "Searching..."
      axios.get('/admin/search_organizer/?query=' + obj.search_query)
      .then(function (content) {
        if (content.data == 'empty') {
          obj.search_loader = ""
        }else if (content.data == 'no match') {
          obj.errors = "No Matching Records!"
          obj.search_loader = ""
        }else {
          obj.search_loader = ""
          obj.search_results = content.data
          obj.errors = ""
        }
      })
    }, 500)
  }
});
</script>
@stop
