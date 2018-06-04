<template>
	  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div :class="className">
            <div class="inner">
              <h3>{{unit}}</h3>

              <p>{{title}}</p>
            </div>
            <div class="icon">
              <i :class="icon"></i>
            </div>
            <router-link :to="link" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
          </div>
        </div>
</template>
<script>
	export default {
		props: {
			className: {
				type: String,
				default: 'small-box bg-aqua'
			},
			unit: {
				type: Number,
				default: 0
			},
			title: {
				type: String,
				default: 'Users'
			},
			link: {
				type: String,
				default: '#'
			},
			icon: {
				type: String,
				default: 'ion ion-bag'
			}
		}
	}
</script>