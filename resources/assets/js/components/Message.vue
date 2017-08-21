<template>

	<div>
		<li class="list-group-item" :class="className"><slot></slot></li>

		<small class="badge float-right" :class="badgeClass"></small>
	</div>
</template>

<style type="text/css"></style>

<script type="text/javascript">
	export default {
		props: [
			'color'
		],
		computed: {
			className() {
				return 'list-group-item-' + this.color;
			},
			badgeClass() {
				return 'badge-' + this.color;
			}
		},
		mounted() {
			console.log('Message Component mounted.');
		}
	}
</script>