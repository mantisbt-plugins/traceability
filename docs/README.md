<ul>
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url | absolute_url}}">{{ post.title }}</a>
      {{ post.excerpt | remove: '<p>' | remove: '</p>' }}
    </li>
  {% endfor %}
</ul>