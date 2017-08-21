<template>

	<div>
		<span class="list-group-item" :class="className">
            <slot></slot>
        </span>

		<small class="badge float-right" :class="badgeClass">{{ user }}</small>
        <span class="badge float-right time">{{ time }}</span>
	</div>
</template>

<style type="text/css">
    .time {
        font-size: 85%;
        color: #1c1c1c;
    }
</style>

<script type="text/javascript">
	export default {
		props: [
			'color',
			'user',
            'time'
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