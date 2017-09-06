<section class="section-refine-search">
      <div class="container">
        <div class="row">
          <form class="row">
            <div class="keyword col-md-8 dropdown">
              <label>Search Event</label>
              <div class="dropdown-toggle" data-toggle="dropdown">
                <input id="search_query" type="text" class="form-control hasclear" value="" placeholder="Search">
              </div>
              <span class="clearer"><img src="/theme/publish/images/clear.png" alt="clear"></span>
            </div>
            <div class="col-md-4 p-t-10">
              <input type="submit" value="Search">
            </div>
          </form>
        </div>
      </div>
</section>

<script type="text/javascript">
var search_query: '';
var search_results: [];
var errors: '';
var search_loader: '';

function search() {
  var obj = this;
  obj.search_loader = "Searching..."
  axios.get('/search?query=' + obj.search_query)
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
}


</script>

<script>

export default {
  mounted() {
  },

  data() {
    return {
      search_query: '',
      search_results: [],
      errors: '',
      search_loader: ''
    }
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
      axios.get('/search_results?query=' + obj.search_query)
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
}
</script>
