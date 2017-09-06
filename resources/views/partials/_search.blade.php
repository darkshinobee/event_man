<div id="app">
  <section class="section-refine-search">
    <div class="container">
      <div class="row">
        <form class="row">
          <div class="keyword col-md-8 dropdown">
            <label>Search Event</label>
            <div class="dropdown-toggle" data-toggle="dropdown">
              <input type="text" class="form-control hasclear" placeholder="Search"
              v-model="search_query" @keyup.enter="search()">
            </div>
            <span class="clearer"><img src="/theme/publish/images/clear.png" alt="clear"></span>

            <ul class="search_res dropdown-menu search_ddown" v-if="search_query.length">
              <li class="single_search_result" v-for="result in search_results">
                <a :href="'/games/'+result.slug">
                  <img :src="result.image_path" alt="" class="result_image">
                  <span class="result_name">{ result.title } - </span>
                  <em>
                    { result.platform }
                  </em>
                </a>
              </li>
              <li class="single_search_result text-center" v-if="search_loader">{ search_loader }</li>
              <li class="single_search_result text-center" v-if="errors">{ errors }</li>
            </ul>

          </div>
          <div class="col-md-4 p-t-10">
            <input type="submit" value="Search">
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<script src="node_modules/vue/dist/vue.js"></script>
<script>
var app = new Vue ({
  el: '#app',
  delimiters: ['{', '}'],
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
    }, 500)
  }
}
})
</script>
