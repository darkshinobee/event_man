<template>
  <div>
      <section class="section-refine-search dropdown">
        <div class="container">
          <div class="row">
              <div class="keyword col-md-8 dropdown-toggle" data-toggle="dropdown">
                <label>Search Event</label>
                  <input type="text" class="form-control hasclear" placeholder="Search"
                  v-model="search_query" @keyup.enter="search()">
                  <span class="clearer"><img src="/theme/publish/images/clear.png" alt="clear" @click="clear"></span>
                </div>
              <div class="col-md-4 p-t-10">
                <input type="submit" value="Search" @click="search">
              </div>

            <ul class="search_res dropdown-menu search_ddown" v-if="search_query.length">
              <li class="single_search_result" v-for="result in search_results">
                <a :href="'/events/'+result.slug">
                  <div class="row">
                    <div class="col-sm-4">
                      <img :src="result.image_path" alt="" class="img-responsive">
                    </div>
                    <div class="col-sm-8">
                      <ul class="search_res result_name">
                        <li>{{ result.title }}</li>
                        <li>{{ result.venue }}</li>
                        <li>{{ result.state }}</li>
                        <li>{{ result.organizer }}</li>
                        <!-- <li>{{ (result.category).toUpperCase() }}</li> -->
                        <!-- <li>&#8358;{{ result.regular_fee }}</li> -->
                        <!-- <li v-if="result.status == 0">{{ result.event_start_date }}</li>
                        <li v-else>Expired</li> -->
                      </ul>
                    </div>
                  </div>
                </a>
              </li>
              <li class="single_search_result text-center" v-if="search_loader">{{ search_loader }}</li>
              <li class="single_search_result text-center" v-if="errors">{{ errors }}</li>
            </ul>
          </div>
        </div>
      </section>
  </div>
</template>

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
      axios.get('/search/1?query=' + obj.search_query)
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
    }, 500),

    clear: function() {
      var obj = this;
      obj.search_query = ""
    }
  }
}
</script>

<style>
.search_res {
  list-style-type: none;
}
.single_search_result {
  border-bottom: 2px solid #eeeeee;
  padding:10px;
}
.single_search_result:hover {
  cursor : pointer;
}
.result_name {
  font-weight: bold;
}
.search_ddown {
  overflow-y: scroll;
  max-height: 350px;
  width: 65%;
}
.result_image {
  width: 100px;
  height: 50px;
}
</style>
