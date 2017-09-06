<template lang="html">
  <div class="dropdown">
    <div class="hero-search dropdown-toggle" data-toggle="dropdown">
      <input type="text" placeholder="Seach Artist, Team, or Venue"
      v-model="search_query" @keyup.enter="search()">
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
                <li>{{ result.organizer }}</li>
                <li>{{ result.category }}</li>
                <li>&#8358;{{ result.regular_fee }}</li>
                <li v-if="result.status == 0">{{ result.event_start_date }}</li>
                <li v-else>Expired</li>
              </ul>
            </div>
          </div>
        </a>
      </li>
      <li class="single_search_result text-center" v-if="search_loader">{{ search_loader }}</li>
      <li class="single_search_result text-center" v-if="errors">{{ errors }}</li>
    </ul>
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
    }, 500),

    clear: function() {
      var obj = this;
      obj.search_query = ""
    }
  }
}
</script>

<style lang="css">
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
  width: 100%;
}
.result_image {
  width: 100px;
  height: 50px;
}
</style>
