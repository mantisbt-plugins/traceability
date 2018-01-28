## Features
<ul>
	<li>
		<span>Real-time traceability analysis of your issues to both requirements and tests</span>
		<figure>
			<img alt="Traceability analysis" src="https://mantisbt-plugins.github.io/traceability/assets/traceability_analysis_1_2_X.png" />
			<figcaption style="text-align: center;">Traceability analysis in MantisBT 1.2.X</figcaption>
		</figure>
	</li>
</ul>

## Releases
<div>
	<p>Releases with major version number equal to 2 are targeted for MantisBT 1.3.12 and above</p>
	<p>Releases with major version number equal to 3 are targeted for MantisBT 2.3.0 and above</p>
</div>
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