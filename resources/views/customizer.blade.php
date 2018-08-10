@extends('layouts.default', ['title' => 'Customizer - '])

@section('content')
<div id="root">
	<vt-customizer></vt-customizer>
</div>

<script>
const i18n = new VueInternationalization({
	locale: document.documentElement.lang,
	fallbackLocale: 'en',
	messages: Locale,
});
new Vue({
	el: '#root',
	i18n,
	store: cStore,
	created() {
		this.$store.dispatch('getSettings');
	},
});
</script>
@overwrite
