<template>
	<nav class="navbar navbar-default">
		<div class="container">
			 <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <router-link to="/home" class="navbar-brand">{{ setting.site_name }}</router-link>
			    </div>
			     <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              	<ul class="nav navbar-nav navbar-right">
        		  <router-link to="/home/message" tag="li"><a>Message</a></router-link>
        		  <router-link to="/home/account" tag="li"><a>My Account</a></router-link>
        		   <li><a href="#"><img :src="uri + user.avatar" width="20" height="20" class="img img-circle"></a></li>
        	    </ul>
              </div>
		</div>
	</nav>
</template>

<script>
	export default{
		data(){
			return{
				user: window.User,
				uri: window.url
			}
		},
		computed: {
			setting(){
				return this.$store.state.settings
			}
		}
	}
</script>