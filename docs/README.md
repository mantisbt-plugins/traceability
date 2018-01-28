## Releases
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
<div>
	<p style="margin:0;">Releases with major version number equal to 2 are targeted for MantisBT 1.3.12 and above.</p>
	<p style="margin:0;">Releases with major version number equal to 3 are targeted for MantisBT 2.3.0 and above.</p>
</div>

## Features
<ul>
	<li>
		<span>Trace your issues to both requirements and tests</span>
		<img alt="Issue Traceability" 
			src="https://mantisbt-plugins.github.io/traceability/assets/issue_custom_field_1_2_X.png" 
			title="Issue traceability in MantisBT 1.2.X" />
	</li>
	<li>
		<span>Assess the traceability of your issues</span>
		<img alt="Traceability analysis" 
			src="https://mantisbt-plugins.github.io/traceability/assets/traceability_analysis_1_2_X.png" 
			title="Traceability analysis in MantisBT 1.2.X" />
	</li>
</ul>

## RSS feed
<div>
<a href="https://mantisbt-plugins.github.io/traceability/atom.xml">RSS feed</a>
</div>