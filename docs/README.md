## Features
<ul>
	<li>
		<span>Real-time traceability analysis of your issues to both requirements and tests</span>
		<img alt="Traceability analysis" src="https://github.com/mantisbt-plugins/traceability/blob/master/wiki/traceability_analysis_1_2_X.png"></img>
	</li>
</ul>

## News
<div>
<ul class="posts">
	{% for post in site.posts %}
	<li>
		<span>{{ post.date | date_to_string }} : </span>
		<a href="https://mantisbt-plugins.github.io/traceability{{ post.url }}" title="{{ post.title }}">{{ post.title }}</a>
	</li>
	{% endfor %}
</ul>
</div>

## RSS feed
<div>
<a href="https://mantisbt-plugins.github.io/traceability/atom.xml">RSS feed</a>
</div>