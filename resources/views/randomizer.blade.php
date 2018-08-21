@extends('layouts.default', ['title' => __('randomizer.title') . ' - '])

@section('content')
<div id="root">
	<vt-item-randomizer version="{!! ALttP\Randomizer::LOGIC !!}" enemizer-version="{!! ALttP\Enemizer::VERSION !!}" id="seed-generate"></vt-item-randomizer>
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
