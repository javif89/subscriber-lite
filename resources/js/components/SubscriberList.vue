<template>
  <div class="subscriber-list">
      <h3>My Subscribers</h3>
      <div class="mt-3">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <td>Name</td>
                      <td>Email</td>
                      <td>State</td>
                      <td>State</td>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="s in subscribers" :key="s.id">
                      <td>{{s.name}}</td>
                      <td>{{s.email}}</td>
                      <td>{{s.state}}</td>
                      <td>
                          <div class="d-flex">
                              <button class="btn btn-sm mr-2 btn-primary">Edit</button>
                              <button class="btn btn-sm btn-danger">Delete</button>
                          </div>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</template>

<script>
export default {
    data() {
        return {

        };
    },
    props: ['subscribers'],
    methods: {

    }
}
</script>

<style>

</style>