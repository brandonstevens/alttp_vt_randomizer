@extends('layouts.default', ['title' => __('navigation.entrance') . ' - '])

@section('content')
<div id="root">
	<vt-entrance-randomizer version="{!! ALttP\EntranceRandomizer::VERSION !!}" enemizer-version="{!! ALttP\Enemizer::VERSION !!}" id="seed-generate"></vt-entrance-randomizer>
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
		this.$store.dispatch('getSprites');
	},
});
</script>
@overwrite
