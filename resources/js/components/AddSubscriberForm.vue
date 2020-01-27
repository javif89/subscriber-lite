<template>
  <div class="add-subscriber-form">
    <h3>Add a subscriber</h3>
    <form action @submit.prevent="createSubscriber">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Name</label>
            <input type="text" class="form-control" v-model="subscriber.name"  required/>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Email</label>
            <input type="email" class="form-control" v-model="subscriber.email"  required/>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for>State</label>
                <select v-model="subscriber.state" id class="form-control" required>
                  <option value="active">Active</option>
                  <option value="unsubscribed">Unsubscribed</option>
                  <option value="junk">Junk</option>
                  <option value="bounced">Bounced</option>
                  <option value="unconfirmed">Uncomfirmed</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for>&nbsp;</label>
                <div>
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      subscriber: {
        name: "",
        email: "",
        state: "active"
      },
      loading: false
    };
  },
  methods: {
    createSubscriber() {
        this.loading = true;
        let url = route('subscriber.store');

        window.axios.post(url, this.subscriber)
        .then(response => {
            this.$emit('created', response.data);
        }).catch((err) => {
            console.log(err.response.data);
            let error = err.response.data[Object.keys(err.response.data)[0]][0];
            Swal.fire({
              title: 'Error!',
              text: error,
              icon: 'error',
              confirmButtonText: 'Ok'
            });
        }).finally(() => {
            this.loading = false
        });
    }
  }
};
</script>

<style>
</style>