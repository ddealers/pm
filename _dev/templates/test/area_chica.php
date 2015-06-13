{% extends "layout.html" %}


{% block content %}
 {% for id_a in id_a %} 

<section id="master">
    <header>
        <article>
            <ul>
                <li>   {{ id_a.date  }}</li>
            </ul>
        </article>
    </header>
    <!-- articulo principal -->
    <article>
        <header>
            <nav> {{ id_a.id }}</nav>
            <h1>  {{ id_a.program_name  }}</h1>
            <nav>sharing</nav>
        </header>
        {{ id_a.content  }}
    </article>
    <!-- articulo principal -->
    <section id="pmPublicity">
        <div>publicidad</div>
    </section>
    <section id="container">
        <section id="content">
            <!-- microContainerNew.php -->
            <!---microContainerPast.php -->
        </section>
        <aside>
            <!-- promotion -->

        </aside>
    </section>







    </article>
</section>


  {% endfor %}
{% endblock %}