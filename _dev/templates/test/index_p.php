{% extends "layout.html" %}


{% block content %}


 {% for id_g in id_g %} 
<h1 align="center">
   
  {{ id_g.id }}
     
</h1>

<h2>
   
   {{ id_g.date  }}
     
</h2>
<h2>
   
   {{ id_g.program_name  }}
     
</h2>

<h5>
   
   {{ id_g.content  }}
     
</h5>


  {% endfor %}
{% endblock %}


