<template>
	<div>
		<link rel="stylesheet" href="/css/style-blocked-dates.css">

		<div class="container primary-container">
			<div class="row">

        <div class="alert alert-danger" v-if="errors.date || errors.motive">
            <p v-if="errors.date">{{ errors.date[0] }}</p>
            <p v-if="errors.motive">{{ errors.motive[0] }}</p>
        </div>

				<div class="col-md-3">
					<input type="text" class="form-control"
					v-model="date_input"
					v-on:keyup.enter="add"
					id="date-input"
					placeholder="01/01/2018"
					pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"></input>
				</div>

				<div class="col-md-5">
					<input type="text" class="form-control"
					v-model="motive_input"
					v-on:keyup.enter="add"
					id="motive-input"
					placeholder="Extended holiday..."></input>
				</div>

				<div class="col-md-2 check">
					<input type="checkbox" class="ckeckbox"
					v-model="block_input"> Block</input>
				</div>

				<div class="col-md-2">
					<button style="color:#fff;" class="btn btn-primary" type="button" v-on:click="add">add</button>
				</div>
			</div>
		</div>
		<!--end input e container-->

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">blocking history</h2>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul>
						<span v-for="item in dates" :item="item">
							<li><i class="fa fa-circle-o" aria-hidden="true"></i>
								{{ item.date }}
								<span v-if="item.motive" class="descrition">{{ item.motive }}</span>
								<a href="#" v-on:click="remove(item)">
									<i class="fa fa-trash-o" aria-hidden="true"></i>
								</a>
							</li>
							<input type="hidden" name="date[]" :value="item.date"></input>
						</span>
					</ul>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
export default {
	data() {
		return {
			dates: [],
      date_input: "",
      motive_input: "",
      block_input: true,
      errors: [],
		}
	},
	methods: {
    add: function() {
      var new_date = {
        'date': this.date_input,
        'motive': this.motive_input,
        'id': 0,
      };

      var data = {};
      data['_token'] = $('input[name=_token]').val();
      data['_method'] = 'POST';
      data['date'] = this.date_input;
      data['motive'] = this.motive_input;
      data['block'] = this.block_input ? '1' : '0';

      var self = this;

      $.ajax({
        url: '/blocked-dates/',
        method: 'POST',
        dataType: 'json',
        data: data,
        error: function(data) {
          self.errors = data.responseJSON.errors;
          console.debug(data);
        },
        success: function(data) {
          self.dates.push(new_date);
          new_date.id = data.responseText;
          self.errors = [];
          console.debug(data);
          self.date_input = "";
          self.motive_input = "";
        }
      });

    },

    remove: function(item) {
      var data = {};
      data['_token'] = $('input[name=_token]').val();
      data['_method'] = 'DELETE';
      //data['date_id'] = item.id;

      self = this;

      $.ajax({
        url: '/blocked-dates/'+item.id,
        method: 'POST',
        data: data,
        success: function(data) {
          self.dates.splice(self.dates.indexOf(item), 1);
        },
        complete: function(data) {
          console.debug(data);
        }
      });
    },

    dateFormat: function(dateString) {
			var dateParts = dateString.split('-');
      return dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0];
    },
	},
	mounted() {
		console.log('Blocked Dates: Component mounted.');

    $(document).on("keypress", "#date-input", function(event) {
      if (event.keyCode == 13) {
        event.preventDefault();
      }
    });

    $(document).on("keypress", "#motive-input", function(event) {
      if (event.keyCode == 13) {
        event.preventDefault();
        $("#date-input").focus();
      }
    });

    self = this;

    $.get('/blocked-dates/all.json', function(data) {
      self.dates = data;

      self.dates.forEach(function(d) {
        d.date = self.dateFormat(d.date);
      });
    });
	}
}
</script>
